<template>
  <div class="panel panel-primary">
    <div class="panel-heading">Register</div>
    <div class="panel-body">
      <form class="form-horizontal" method="POST" action="/register" @submit.prevent="register" @keydown="errors.clear($event.target.name)">
        <div :class="['form-group', { 'has-error' : errors.has('name') }]">
          <label for="name" class="col-md-4 control-label">Name</label>
          <div class="col-md-6">
            <input v-model="name" id="name" type="text" class="form-control" name="name" autofocus>
            
            <span class="help-block" v-if="errors.has('name')">
              <strong>{{ errors.get('name') }}</strong>
            </span>
          </div>
        </div>

        <div :class="['form-group', { 'has-error' : errors.has('email') }]">
          <label for="email" class="col-md-4 control-label">Email</label>

          <div class="col-md-6">
            <input v-model="email" id="email" type="email" class="form-control" name="email">
            
            <span class="help-block" v-if="errors.has('email')">
              <strong>{{ errors.get('email') }}</strong>
            </span>
          </div>
        </div>

        <div :class="['form-group', { 'has-error' : errors.has('password') }]">
          <label for="password" class="col-md-4 control-label">Password</label>

          <div class="col-md-6">
            <input v-model="password" id="password" type="password" class="form-control" name="password">
            
            <span class="help-block" v-if="errors.has('password')">
              <strong>{{ errors.get('password') }}</strong>
            </span>
          </div>
        </div>

        <div :class="['form-group', { 'has-error' : errors.has('address') }]">
          <label for="name" class="col-md-4 control-label">Address</label>
          <div class="col-md-6">
            <input v-model="address" id="address" type="text" class="form-control" name="address">
            
            <span class="help-block" v-if="errors.has('address')">
              <strong>{{ errors.get('address') }}</strong>
            </span>
          </div>
        </div>

        <div class="form-group">
          <div class="col-md-6 col-md-offset-4">
            <button type="submit" class="btn btn-primary" :disabled="errors.any() || processing">{{ processing ? 'Processing...': 'Register' }}</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import Error from '../Error';

export default {  
  data() {
    return {
      name: '',
      email: '',
      password: '',
      address: '',
      processing: false,
      errors: new Error()
    };
  },

  methods: {
    register() {
      this.processing = true;
      
      axios.post('/api/register', this.$data)
        .then(({ data }) => {
          alert('Registration successful. Please verify your email address.');
          this.processing = false;
        })
        .catch(error => {
          this.errors.record(error.response.data.errors);
          this.processing = false;
        });
    }
  }
};
</script>
