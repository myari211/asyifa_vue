<template>
  <div>
    <!-- disini saya menggunakan bootstrap untuk design tabel nya. secara default bootstrap sudah di include di file welcome.blade.php jadi saya tidak perlu lagi untuk import file nya -->
    <div class="row">
      <div class="col-md-12">
        <br>
        <br>
        <div class="row">
          <div class="col-md-10">
            <h4>Persons</h4>
          </div>
          <div class="col-md-2">
            <!-- push router ke form membuat data -->
            <router-link class="btn btn-primary w-100" to="/create">+ Tambah</router-link>
          </div>
        </div>
        <br>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Kode Akun</th>
              <th scope="col">Jenis Akun</th>
              <th scope="col">Bagian Akun</th>
              <th scope="col">Nama Akun</th>
            </tr>
          </thead>
          <tbody>
            <!-- menampilkan data ke table -->
            <tr v-for="akun in akun" :key="akun.id">
              <td>{{akun.kode_akun}}</td>
              <td>{{akun.jenis_akun}}</td>
              <td>{{akun.bagian_akun}}</td>
              <td>{{akun.nama_akun}}</td>
              <td>
                <router-link class="btn btn-warning" :to="'/detail/'+akun.id">Update</router-link>
                <button class="btn btn-danger" v-on:click="deleteData(akun.id)">Delete</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
    export default {
        data(){
            return {
                akun : []
            };
        },
        created() {
            this.loadData();
        },
        methods: {
            loadData(){
                axios.get("http://localhost:8000/api/akun").then(response=>{
                    this.akun = response.data;
                });
            },
            deleteData(id){
                axios.delete("http://localhost:8000/api/akun/delete/" + id).then(response => {
                    this.loadData();
                });
            }
        }
    };
</script>