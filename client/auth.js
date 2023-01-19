function auth(){
   var userAuthenticated = false; 
   var accessToken =  localStorage.getItem('access_token');

   if(accessToken == null){

    userAuthenticated = false;

   }

   if(accessToken != null){
    userAuthenticated = true;
   }

   return userAuthenticated;
}

export default auth;