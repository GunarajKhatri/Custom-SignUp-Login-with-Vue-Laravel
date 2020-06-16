<template>
<div class="container" style="margin-top:100px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Register

           <h5 :class="{'text-success':msg}">{{message}}</h5>
                </div>

                <div class="card-body">
                    

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control"autofocus v-model="lists.name">
                                <span v-if="errors.name"class="text-danger">{{errors.name[0]}}</span>

                                
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email"v-model="lists.email">
                                <span v-if="errors.email"class="text-danger">{{errors.email[0]}}</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password" v-model="lists.password">
                                <span v-if="errors.password"class="text-danger">{{errors.password[0]}}</span>
                                
                            </div>
                        </div>

                      

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary"@click="save">
                                    Register
                                </button>
                            </div>
                        </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>


</template>
<script>
    export default {
        data(){
         return{
         lists:{
          name:'',
          email:'',
          password:''
         },
         errors:{},
         msg:false,
         message:''

         }
        },
        methods:{
        save(){
          axios.post('/register',this.$data.lists).then((response)=>{
	   this.msg=true
	   this.message="Data Inserted Successfully !!"
	   this.errors=''
	   this.lists.name=''
	   this.lists.email=''
	   this.lists.password=''

	   
	    })
	  .catch((error)=>{this.errors=error.response.data.errors
	  		if(this.errors!=''){
	  			this.message=''
	  		}

	  }) 
        }
        }
    }
</script>