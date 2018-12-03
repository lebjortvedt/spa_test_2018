<template>
  <div>
    <h1>Edit song</h1>
    <form @submit.prevent="updateSong">
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
              <label>Song name:</label>
              <input type="text" class="form-control" v-model="song.song_name">
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
          <button class="btn btn-primary">Update</button>
        </div>
    </form>
  </div>
</template>

<script>
    export default {
      data() {
        return {
          song: {}
        }
      },
      created() {
        let uri = `http://localhost:8000/api/song/edit/${this.$route.params.id}`;
        this.axios.get(uri).then((response) => {
            this.song = response.data;
        });
      },
      methods: {
        updateSong() {
          let uri = `http://localhost:8000/api/song/update/${this.$route.params.id}`;
          this.axios.post(uri, this.song).then((response) => {
            this.$router.push({name: '/vue/songs'});
          });
        }
      }
    }
</script>
