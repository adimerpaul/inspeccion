import Index from "../pages/Index";
import Login from "../pages/Login";
// import Local from "../pages/Local";
import User from "pages/User";
import Historial from "pages/Historial";
import Registro from "pages/Registro";
// import Pacientes from "pages/Pacientes";
// import Porcaducar from "pages/Porcaducar";
// import Reactivo from "pages/Reactivo";

const routes = [
  {
    path: '/',
    component: () => import('layouts/MainLayout.vue'),
    children: [
      { path: '', component: Index },
      { path: 'login', component: Login},
      { path: 'user', component: User,meta:{requiresAuth: true}},
      { path: 'registro', component: Registro,meta:{requiresAuth: true}},
      { path: 'historial', component: Historial,meta:{requiresAuth: true}},
      // { path: 'pacientes', component: Pacientes,meta:{requiresAuth: true}},
      // { path: 'porcaducar', component: Porcaducar,meta:{requiresAuth: true}},
      // { path: 'reactivo', component: Reactivo,meta:{requiresAuth: true}},
    ]
  },

  // Always leave this as last one,
  // but you can also remove it
  {
    path: '/:catchAll(.*)*',
    component: () => import('pages/Error404.vue')
  }
]

export default routes
