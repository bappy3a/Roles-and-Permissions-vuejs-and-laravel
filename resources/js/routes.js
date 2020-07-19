let home = require('./components/home.vue').default;
let role = require('./components/role.vue').default;
let assingrole = require('./components/assingrole.vue').default;



export const routes = [
  { 
  	path: '/home', 
  	component: home, 
  	name:'home'  
  },
  { 
  	path: '/role', 
  	component: role, 
  	name:'role'  
  },
  { 
    path: '/assingrole', 
    component: assingrole, 
    name:'assingrole'  
  },


]