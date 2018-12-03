<template>
  <div>
    <h1>Add a song</h1>
    <form @submit.prevent="addSong">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Artist name:</label>
            <input type="text" class="form-control" v-model="song.artist_name">
          </div>
        </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Song title:</label>
              <input type="text" class="form-control" v-model="song.song_title">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Release year:</label>
              <input type="text" class="form-control" v-model="song.release_year">
            </div>
          </div>
        </div><br />
        <div class="form-group">
          <button class="btn btn-primary">Add</button>
        </div>
    </form>
  </div>
</template>

<script>
    export default {
        data(){
        return {
          song:{}
        }
    },
    methods: {
      addSong(){
          let uri = 'http://localhost:8000/api/create';
          this.axios.post(uri, this.song).then((response) => {
              this.$router.push({name: 'Songs'});
          });
      }
    }
  }
</script>
