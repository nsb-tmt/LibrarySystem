document.getElementById('display').style.display='none'; 
//クリックメソッド
document.getElementById('getBookInfo').addEventListener('click', openBD);
document.getElementById('getGoogleInfo').addEventListener('click', googleBooks);

function reset(){
    //前回の検索や表示をリセット
    if(document.getElementById('success')){
      document.getElementById('success').style.display='none';
    }
    document.getElementById('display').style.display='none';
    document.getElementById('input').style.display='none';
    document.getElementById('coverFile').style.display='none';
    document.getElementById('cover').style.display='none';
    document.getElementById('errorJS').innerHTML="";
    if(document.getElementById('errorPHP')){
      document.getElementById('errorPHP').innerHTML="";
    }
    document.getElementById('searchContainer').innerHTML = "";      
}

function openBD(){
    reset();//表示のリセット
    // isbnに入力された値を取得 
    var isbn = document.getElementById('getIsbn').value;
    if(isbn.length<1){
      //空のとき
      document.getElementById('errorJS').innerHTML = '<p style="color:#ff6347">ISBNを入力してください。</p>';
      return;
    }
    bookinfo(isbn);
}
function googleBooks(){
  reset();
  // 入力された値を取得
  var intitle = document.getElementById('getTitle').value;
  var inauthor = document.getElementById('getAuthor').value;

  if(intitle.length>0&&inauthor.length>0){
    //書籍名・著者名を併せて検索
    var query = "intitle:"+intitle+'+'+"inauthor:"+inauthor;
  }else if(intitle.length>0){
    //タイトル検索
    var query = "intitle:"+intitle;
  }else if(inauthor.length>0){
    //著者名検索
    var query = "inauthor:"+inauthor;
  }else{
    //情報の入力がない時
    document.getElementById('errorJS').innerHTML = '<p style="color:#ff6347">書籍名か著者名を入力してください</p>';
    return;
  }
  var max =40;//検索結果の最大数
  //GoogleBooksを使用。
  const url = "https://www.googleapis.com/books/v1/volumes?q=" + query + "&maxResults=" +max;
    fetch(url).then(
    response => {
    return response.json();
    }).then(data => {
      if(!data) {
        //データが見つからない時の処理
        errorJS();
        return;
      }
      var table =
      '<span id="count"></span>'+
      '<table class="table">'+
      '<tr><th>表紙</th><th>ISBN番号</th><th>書籍名</th><th>著者名</th><th>出版社</th><th></th></tr>';
      var count = 0;
      for(var item of data.items){
        //ISBN番号がないとき
        var isbnFlg=false;
        var isbn="";
        try{
          for(var type of item.volumeInfo.industryIdentifiers){
            //ISBN番号を持つ結果のみを表示
            if(type.type=="ISBN_13"||type.type=="ISBN_10"){
              isbnFlg=true;
              // isbn=item.volumeInfo.industryIdentifiers[0].identifier;
              isbn=type.identifier;
              break;
            }
          }
        }catch(e){
          //industryIdentifiersがないとき
          continue;//表示しない
        }

        if(!isbnFlg){
          continue;
        }
        try{
          var img = item.volumeInfo.imageLinks.thumbnail == undefined ? '/img/noImage.jpg': item.volumeInfo.imageLinks.thumbnail;
        }catch(e){
          var img = "/img/noImage.jpg";
        }
        if(isbn.includes('X')){
          //isbnにXを使用されている場合はXを0に変換する
          isbn = isbn.replace('X','0');
        }
        table +=
        '<tr>'+
        '<td><img src="'+ img +'" alt="" style="width:50%"></td>'+
        '<td>'+ isbn+'</td>'+
        '<td>'+ (item.volumeInfo.title == undefined ? '不明': item.volumeInfo.title) +'</td>'+
        '<td>'+ (item.volumeInfo.authors == undefined ? '不明 ': item.volumeInfo.authors) +'</td>'+
        '<td>'+ (item.volumeInfo.publisher ==undefined ? '不明 ': item.volumeInfo.publisher)+'</td>'+
        '<td><a href="#" onclick="isbnClick('+isbn+')"><button class="btn-primary">登録</button></a></td>'+
        '</tr>';
        count++;
      }
      table +='</table>';
      document.getElementById('searchContainer').innerHTML = table;      
      document.getElementById('count').textContent ='検索結果：'+count+'冊';
  }).catch(error => {
    //検索結果がない時はここでキャッチ
    errorJS();
  });
}
function isbnClick(num){
  //検索結果のISBNをクリックした際にページ上部に自動入力
  document.getElementById('getIsbn').value = num;
  openBD();
}
function bookinfo(isbn){ 
  //isbn検索をしてドキュメントを操作する
  const url = "https://api.openbd.jp/v1/get?isbn=" + isbn + "&pretty";
      fetch(url).then(
      response => {
        return response.json();
      }).then(data => {
        if( data[0] == null ) {
          //データが見つからない時の処理
          errorJS();
          return;
        }
        //画像ソースがないときはサイトに保存して使用してもよい
        try{          
            //coverは処理が違うため先に処理
            var cover = data[0].summary.cover;
            if(cover != ""){//表紙がある時
              document.getElementById('thumbnail').setAttribute('src', cover);
              document.getElementById('cover').value = cover;
            }else{
              document.getElementById('thumbnail').setAttribute('src', "/img/noImage.jpg");
              document.getElementById('coverFile').style.display='';//カバーファイル入力用の処理
            }
        }catch(e){
          document.getElementById('thumbnail').setAttribute('src', "/img/noImage.jpg");
          document.getElementById('coverFile').style.display='';//カバーファイル入力用の処理
        }

        var book = new Object();//戻り値用の連想配列のデータ
        try{
          book['isbn'] = data[0].summary.isbn;
        }catch(e){
          book['isbn'] = "err:取得エラー";
        }
        try{
          book['title'] = data[0].summary.title;
        }catch(e){
          book['title'] = "err:取得エラー";
        }

        try{
          book['author'] = data[0].summary.author;
        }catch(e){
          book['author'] ="err:取得エラー";
        }

        try{
          book['publisher'] = data[0].summary.publisher;
        }catch(e){
          book['publisher'] = "err:取得エラー";
        }

        try{
          book['price'] = data[0].onix.ProductSupply.SupplyDetail.Price[0].PriceAmount;
        }catch(e){
          book['price'] ="err:取得エラー";
        }

        try{
          book['description'] = data[0].onix.CollateralDetail.TextContent[0].Text;

        }catch(e){
          book['description'] = "err:取得エラー";
        }
        //検索結果の表示
        document.getElementById('display').style.display='';
        for(let key in book){
          if(book[key]=="err:取得エラー"||book[key]==""){
            //取得エラーのとき
            document.getElementById('input').style.display='';
            document.getElementById(key).value='';
            document.getElementById(key).readOnly=false;
            document.getElementById('p-'+key).innerHTML ='<p style="color:#ff6347">情報がありません</p>';
            continue;
          }
          document.getElementById(key).value = book[key];
          document.getElementById('p-'+key).textContent =book[key];
        }
      }).catch(error => {
        errorJS();
      });
}

function errorJS(){
  document.getElementById('errorJS').innerHTML ='<p style="color:#ff6347">検索結果がありませんでした。</p><br>';
}