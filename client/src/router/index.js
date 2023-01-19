import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'

//import TestComponent from '../components/Test.vue'

//import RouterItemOne from '../components/RouterItemOne.vue'

//import RouterItemTwo from '../components/RouterItemTwo.vue'

import LoginView from '../views/LoginView.vue'

import ProfileView from '../views/ProfileView.vue'

import LogoutView from '../views/LogoutView.vue'

import CustomerDetail from '../components/CustomerDetail.vue'

import CustomerInstallmentCreate from '../components/CustomerInstallmentCreate.vue'

import CustomerInstallmentList from '../components/CustomerInstallmentList.vue'




const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView,
      //redirect: '/login',
      /*
      meta: {
        requiresAuth: true
      }
      */
    
    },
    {
      path: '/about',
      name: 'about',
      // route level code-splitting
      // this generates a separate chunk (About.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: () => import('../views/AboutView.vue'),
       meta: {
        requiresAuth: true
      }
    },
    

    // Customer List Routes

    {
      path: '/customers/:id',
      name:'customerDetail',
      component: CustomerDetail,
        meta: {
        requiresAuth: true
      }
    },

     // Customer Installment Routes

      {
      path: '/customer-installment',
      name:'customerInstallment',
      component: CustomerInstallmentCreate,
        meta: {
        requiresAuth: true
      }
    },

      {
      path: '/customer-installment-list',
      name:'customerInstallmentList',
      component: CustomerInstallmentList,
        meta: {
        requiresAuth: true
      }
    },


    // API Login Related Routes

    {
      path: '/login',
      name: 'login',
      component: LoginView
    },

    {
      path:'/profile',
      name: 'profile',
      component: ProfileView,
       meta: {
        requiresAuth: true
      }
    },

    {
      path:'/logout',
      name: 'logout',
      component: LogoutView,
       meta: {
        requiresAuth: true
      }
    }



    /*

    {
      path: '/one',
      name: 'router-item-one',
      component: RouterItemOne
    },
     {
      path: '/two',
      name: 'router-item-two',
      component: RouterItemTwo
    }
    */
  ]
})


// Middleware 

router.beforeEach((to, from, next)=> {
  let user = localStorage.getItem('user');
  console.log(user);

  //console.log(to);
  //console.log(from);
  //console.log(next);

  var isAuthenticated = false;

  if(user !== null){
    isAuthenticated = true;
  }

  // Check if user is authenticated and wants to visit sign in page
  // redirect to home page

  if(isAuthenticated && to.name == 'login'){
    next({name: 'home'});
  }

  // Check if user wants to visit any url rather than login 
  // if user is authernticated
  // if the route requires authtication

  if(to.name != 'login' && !isAuthenticated && to.meta.requiresAuth ){
    next({name: 'login'})
  }
  else {
    next();
  }

  

 



  


  //next();
  
})



//
export default router


//https://www.digitalocean.com/community/tutorials/vuejs-advanced-vue-routing