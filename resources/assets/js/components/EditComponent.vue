<template>
  <div>
    <h1>Edit Post</h1>
    <form @submit.prevent="updateGuest">
      <div class="row">
        <div class="col-md-6">
            <div :class="['form-group', allerros.first_name ? 'has-error' : '']" >
            <label>First Name:</label>
            <input type="text" class="form-control" v-model="guest.first_name">
            <span v-if="allerros.first_name" :class="['label label-danger']">{{ allerros.first_name[0] }}</span>
          </div>
        </div>
        <div class="col-md-6">
          <div :class="['form-group', allerros.last_name ? 'has-error' : '']" >
            <label>Last Name:</label>
            <input type="text" class="form-control" v-model="guest.last_name">
            <span v-if="allerros.last_name" :class="['label label-danger']">{{ allerros.last_name[0] }}</span>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div :class="['form-group', allerros.gender ? 'has-error' : '']" >
            <label>Gender:</label>
            <input type="text" class="form-control" v-model="guest.gender">
            <span v-if="allerros.gender" :class="['label label-danger']">{{ allerros.gender[0] }}</span>
          </div>
        </div>
        <div class="col-md-4">
          <div :class="['form-group', allerros.email ? 'has-error' : '']" >
            <label>Email:</label>
            <input type="text" class="form-control" v-model="guest.email">
            <span v-if="allerros.email" :class="['label label-danger']">{{ allerros.email[0] }}</span>
          </div>
        </div>
        <div class="col-md-4">
          <div :class="['form-group', allerros.phone_number ? 'has-error' : '']" >
            <label>Phone Number:</label>
            <input type="text" class="form-control" v-model="guest.phone_number">
            <span v-if="allerros.phone_number" :class="['label label-danger']">{{ allerros.phone_number[0] }}</span>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div :class="['form-group', allerros.address ? 'has-error' : '']" >
            <label>Address:</label>
            <textarea class="form-control" v-model="guest.address" rows="3"></textarea>
            <span v-if="allerros.address" :class="['label label-danger']">{{ allerros.address[0] }}</span>
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
          guest: {},
          allerros: [],
          success : false
        }
      },
      created() {
        let uri = `http://localhost/api/guest/edit/${this.$route.params.id}`;
        this.axios.get(uri).then((response) => {
            this.guest = response.data;
        });
      },
      methods: {
        updateGuest() {
          let uri = `http://localhost/api/guest/update/${this.$route.params.id}`;
          this.axios.post(uri, this.guest).then((response) => {
          this.allerros = [];
          this.$router.push({name: 'guests', params: {success: 'successfully updated' }});
          this.success = true;
        }).catch((error) => {
             this.allerros = error.response.data.errors;
             this.success = false;
        });
        }
      }
    }
</script>