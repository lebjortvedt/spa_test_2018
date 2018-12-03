<template>
  <div>
      <h1>Songs</h1>
        <div class="row">
          <div class="col-md-10"></div>
          <div class="col-md-2">
            <router-link :to="{ name: 'Create' }" class="btn btn-primary">Add song</router-link>
          </div>
        </div><br />

        <table class="table table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>Artist name</th>
                <th>Song name</th>
                <th>Release year</th>
            </tr>
            </thead>
            <tbody>
                <tr v-for="song in songs" :key="song.id">
                    <td>{{ song.id }}</td>
                    <td>{{ song.artist_name }}</td>
                    <td>{{ song.song_title }}</td>
                    <td>{{ song.release_year }}</td>
                    <td><router-link :to="{name: 'Edit', params: { id: song.id }}" class="btn btn-primary">Edit</router-link></td>
                     <td><button class="btn btn-danger" @click.prevent="deleteSong(song.id)">Delete</button></td>
                </tr>
            </tbody>
        </table>
  </div>
</template>

<script>
  export default {
      data() {
        return {
          songs: []
        }
      },

      mounted() {
      let uri = 'http://localhost:8000/api/songs';
        this.axios.get(uri).then(response => {
            this.songs = response.data.songs;
          });


        /*
        this.axios.get(uri).then((response) => {
            console.log.response.songs;
            /*
            response.forEach(song => {
                this.songs.push(new Song(song));
          });



            this.songs = response.songs;
        */


    },
    methods: {
      deleteSong(id)
      {
        let uri = `http://localhost:8000/api/song/delete/${id}`;
        this.axios.delete(uri).then(response => {
          this.songs.splice(this.songs.indexOf(id), 1);
          this.$router.push({name: 'Songs'});
        });
      }
    }
  }
</script>
