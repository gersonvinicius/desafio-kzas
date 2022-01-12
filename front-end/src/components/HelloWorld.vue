<template>
    <div class="container">
        <!-- login form -->
        <div class="row mt-4" v-if="!list.length">
            <div class="col-6 offset-3">
                <form action="#" @submit.prevent="handleLogin">
                    <h3>Sign in for github list</h3>
                    <div class="form-row">
                        <input type="email" name="email" class="form-control" v-model="formData.email" placeholder="Email Address">
                    </div>
                    <div class="form-row">
                        <input type="password" name="password" class="form-control" v-model="formData.password" placeholder="Password">
                    </div>
                    <div class="form-row">
                        <button type="submit" class="btn btn-primary">Sign In</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- list list -->
        <div class="row mt-4" v-if="list.length">
            <div class="col-6 offset-3">
                <h3>Github List</h3>
                <button class="btn btn-secondary" @click="getList">Get list Again</button>
                <!-- <div class="mb-4"> -->
                  <table>
                    <thead>
                      <td>id</td>
                      <td>avatar</td>
                      <td>login</td>
                      <td>url</td>
                    </thead>
                    <tbody>
                      <tr v-for="(obj, index) in list" :key="index">
                        <td><em v-text="obj.id"></em></td>
                        <td><img :src="obj.avatar_url" width="150" height="150" alt="obj.avatar_url"></td>
                        <td><em v-text="obj.login"></em></td>
                        <td><em v-text="obj.html_url"></em></td>
                      </tr>
                    </tbody>
                  </table>
                <!-- </div> -->
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios'
export default {
  data() {
      return {
          list: [],
          formData: {
              email: '',
              password: ''
          }
      }
  },
  methods: {
      handleLogin() {
          // send axios request to the login route
          axios.get('http://127.0.0.1:8000/sanctum/csrf-cookie').then(response => {
              axios.post('http://127.0.0.1:8000/api/login', this.formData).then(response => {
                  this.getList();
              }).catch(error => {
                alert('Acesso não autorizado!!')
              })
          });
      },
      getList() {
          axios.get('https://api.github.com/users').then(response => {
              console.log(response);
              this.list = response.data;
          });
      }
  }
}
</script>

<style>
    .form-row {
        margin-bottom: 8px;
    }
</style>