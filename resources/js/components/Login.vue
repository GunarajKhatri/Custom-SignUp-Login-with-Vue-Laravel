<template>
<div class="container"style="margin-top:100px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Login</div>

                <div class="card-body">
                   
                       

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Email password</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" required autofocus v-model="lists.email">
                                 <span v-if="active"class="text-danger">{{errors.email}}</span>

                                
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required v-model="lists.password">
                                <span v-if="active"class="text-danger">{{errors.password}}</span>

                                
                            </div>
                        </div>

                       

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary"@click="login">
                                    Login
                                </button>

                                
                                    <a class="btn btn-link" href="#">
                                        Forget your password
                                    </a>
                                
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
          email:'',
          password:''
         },
         errors:{
         },
         active:true,
         message:{}

         }
        },
        methods:{
        login(){
        

          axios.post('/login',this.$data.lists).then((response)=>{
	   this.errors=response.data
	   if(this.errors.success=='You are done'){
	    this.$router.push('/login/home')
	   }
	   
	    })
	  .catch((error)=>{this.errors=error.response.data.errors
	  this.errors.email=this.errors.email[0]
	  this.errors.password=this.errors.password[0]
	  		

	  }) 
        }
        }
        
    }
</script>