document.getElementById('foo').addEventListener('change', function(){
    if( this.value ){
      console.log( "файл" );
      console.log( this.value );
    } else { // Если после выбранного тыкнули еще раз, но дальше cancel
      console.log( "Файл не выбран" ); 
    }
  });