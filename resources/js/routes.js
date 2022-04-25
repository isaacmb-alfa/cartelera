import { createRouter, createWebHistory, createWebHashHistory  } from 'vue-router';

//importar componentes para las peliculas
const Crear = () => import('./components/pelicula/Crear.vue');
const Editar = () => import('./components/pelicula/Editar.vue');
const Mostrar = () => import('./components/pelicula/Mostrar.vue');

export const routes = [
    // {
    //     name: 'crear',
    //     path: '/crear',
    //     component: Crear
    // },
    // {
    //     name: 'editarPelicula',
    //     path: '/editar/:url',
    //     component: Editar
    // },
    // {
    //     name: 'mostrarPelicula',
    //     path: '/cartelera/:url',
    //     component: Mostrar
    // },
]

// Configuración de vue router
export const router = createRouter({
    mode: 'history',
    history: createWebHistory(),
    routes,
});
