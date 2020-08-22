<template>
  <div>
    <div class="row">
      <div class="col-md-6">
        <br>
        <br>
        <h4>Update new data</h4>
        <br>
        <!-- prevent form submit untuk reload halaman, kemudian memanggil function addData() -->
        <form @submit.prevent="updateData()">
          <div class="row">
            <label for="kode_akun">Kode Akun :</label>
            <input type="textfield" class="form-control" id="kode_akun" v-model="form.kodeAkun" required>
          </div>
          <div class="row">
              <label for="jenis_akun">Jenis Akun :</label>
              <input type="textfield" class="form-control" id="jenis_akun" v-model="form.jenisAkun" required>
          </div>
          <div class="row">
              <label for="bagian_akun">Bagian Akun :</label>
              <input type="textfield" class="form-control" id="bagian_akun" v-model="form.bagianAkun" required>
          </div>
          <div class="row">
              <label for="nama_akun">Nama Akun :</label>
              <input type="textfield" class="form-control" id="nama_akun" v-model="form.namaAkun" required>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</template>
<script>
export default {
    data(){
        return{
            form: {
                kodeAkun: "",
                jenisAkun: "",
                bagianAkun: "",
                namaAkun: ""
            }
        };
    },
    created(){
        this.loadData();
    },
    methods: {
        loadData(){
            axios
            .get("http://localhost:8000/api/akun/show/" + this.$route.params.id)
            .then(response => {
                this.form.kodeAkun = response.data.kode_akun,
                this.form.jenisAkun = response.data.jenis_akun,
                this.form.bagianAkun = response.data.bagian_akun,
                this.form.namaAkun = response.data.nama_akun
            });
        },
        updateData(){
            axios
            .put("http://localhost:8000/api/akun/edit/" + this.$route.params.id, {
                kode_akun : this.form.kodeAkun,
                jenis_akun : this.form.jenisAkun,
                bagian_akun : this.form.bagianAkun,
                nama_akun : this.form.namaAkun
            })
            .then(response => {
                this.$router.push("/");
            });
        }
    }
};
</script>