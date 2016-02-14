function check(m,n,o,p,q,r){
 
  var nama = document.jibul.elements[m].value;
  var alamat = document.jibul.elements[n].value;
  var no_telp = document.jibul.elements[p].value;
  var username = document.jibul.elements[q].value;
  var pwd = document.jibul.elements[r].value;

  if (nama.length == 0 || alamat.length == 0 || no_telp.length == 0 || username.length == 0 || pwd.length == 0){
  alert('Isi dulu semua kolom!');
  return false;
  } 
  else {
						return true;
                        
			}            
}
function check_d(m,n){
 
  var nama = document.jibul.elements[m].value;
  var alamat = document.jibul.elements[n].value;
  

  if (nama.length == 0 || alamat.length == 0 ){
  alert('Isi dulu semua kolom!');
  return false;
  } 
  else {
						return true;
                        
			}            
}

