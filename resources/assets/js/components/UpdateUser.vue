<template>
  <div class="panel panel-primary">
    <div class="panel-heading">Update Profile</div>
    <div class="panel-body">
      <form class="form-horizontal" @submit.prevent="update" @keydown="errors.clear($event.target.name)">
        <div :class="['form-group', { 'has-error' : errors.has('name') }]">
          <label for="name" class="col-md-4 control-label">Name</label>
          <div class="col-md-6">
            <input v-model="user.name" id="name" type="text" class="form-control" name="name" autofocus>
            
            <span class="help-block" v-if="errors.has('name')">
              <strong>{{ errors.get('name') }}</strong>
            </span>
          </div>
        </div>

        <div :class="['form-group', { 'has-error' : errors.has('email') }]">
          <label for="email" class="col-md-4 control-label">Email</label>

          <div class="col-md-6">
            <input v-model="user.email" id="email" type="email" class="form-control" name="email">
            
            <span class="help-block" v-if="errors.has('email')">
              <strong>{{ errors.get('email') }}</strong>
            </span>
          </div>
        </div>

        <div :class="['form-group', { 'has-error' : errors.has('password') }]">
          <label for="password" class="col-md-4 control-label">Password</label>

          <div class="col-md-6">
            <input v-model="user.password" id="password" type="password" class="form-control" name="password">
            
            <span class="help-block" v-if="errors.has('password')">
              <strong>{{ errors.get('password') }}</strong>
            </span>
          </div>
        </div>

        <div :class="['form-group', { 'has-error' : errors.has('address') }]">
          <label for="name" class="col-md-4 control-label">Address</label>
          <div class="col-md-6">
            <input v-model="user.address" id="address" type="text" class="form-control" name="address">
            
            <span class="help-block" v-if="errors.has('address')">
              <strong>{{ errors.get('address') }}</strong>
            </span>
          </div>
        </div>

        <div class="form-group">
          <div class="col-md-6 col-md-offset-4">
            <button type="submit" class="btn btn-primary" :disabled="errors.any() || processing">{{ processing ? 'Processing...': 'Update' }}</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import Error from '../Error';

export default {  
  props: ['id'],

  data() {
    return {
      user: {},
      processing: false,
      errors: new Error()
    };
  },

  mounted() {
    if (this.id) {
      this.getUser(this.id);
    }
  },

  methods: {
    update() {
      this.processing = true;
      
      axios.put(`/api/users/${this.user.id}`, this.getData())
        .then(({ data }) => {
          alert('Update successful.');
          this.processing = false;
          window.location.replace(`/users/${data.data.id}`);
        })
        .catch(error => {
          this.errors.record(error.response.data.errors);
          this.processing = false;
        });
    },

    getUser(id) {      
      axios.get(`/api/users/${id}`)
        .then(({ data }) => {
          this.user = data.data;
        })
    },

    getData() {
      return {
        'name': this.user.name,
        'email': this.user.email,
        'address': this.user.address,
        'password': this.user.password
      };
    }
  }
};
</script>
