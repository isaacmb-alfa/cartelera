<template>
  <div class="row">
  <div class="col-md-4 mt-4" v-for="pelicula in this.peliculas" :key="pelicula.id">
    <div class="card">
      <img src="" class="card-img-top" alt="imagen-pelicula" />
      <div class="card-body">
        <h3 class="card-title">{{ pelicula.titulo }}</h3>
        <h5 class="card-text"><strong>Director:</strong> {{ pelicula.director }}</h5>
        <p class="card-text"><strong>Clasificación: </strong> {{ pelicula.clasificacion }}</p>
        <p class="card-text"><strong>Duración: </strong> {{ pelicula.duracion }}</p>
        <p class="card-text"><strong>Inicio exhibición: </strong> {{ pelicula.ini_exhibicion }}</p>
        <p class="card-text"><strong>Fin exhibición: </strong> {{ pelicula.fin_exhibicion }}</p>
        <!-- <router-link class="btn btn-primary btn-block" :to='{name:"mostrarPelicula", params:{url:pelicula.url}}'>Ver pelicula</router-link> -->
        <button >
            Ver pelicula
        </button>
        <router-link :to='{name:"mostrarPelicula", params:{url:pelicula.url}}'>Go to Home</router-link>
        <router-view></router-view>
      </div>
    </div>
  </div>
  </div>
</template>

<script>
export default {
  name: "Home",
  data() {
    return {
      peliculas: [],
      imagen: '',
    };
  },
  mounted() {
    this.mostrarPeliculas();
  },
  methods: {
    async mostrarPeliculas() {
      await this.axios
        .get("/api/peliculas")
        .then((res) => {
          this.peliculas = res.data;
          console.log(res.data);
        })
        .catch((err) => {
          console.log(err);
          this.peliculas = [];
        });
    },
  },
};
</script>

<style>
</style>