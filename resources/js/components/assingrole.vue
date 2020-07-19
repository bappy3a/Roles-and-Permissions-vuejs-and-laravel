<template>
    <div>
        <div class="page-title">
            <h3 class="breadcrumb-header">Role Management</h3>
        </div>
        <div id="main-wrapper">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-white">
                        <div class="panel-heading clearfix">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="panel-title">Role List</h4>
                                </div>
                                <div class="col-md-6">
                                    <select @change='changeAdmin()' v-model="role_id" class="form-control" placeholder="Plase select Role"> 
                                        <option :value="role.id"  v-for="role in roles" :key="role.id">{{ role.name }}</option>
                                    </select>
                                </div>
                            </div>
                            
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Route Namw</th>
                                            <th>Read</th>
                                            <th>Create</th>
                                            <th>Update</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="parmition in parmitions" :key="parmition.id">
                                            <th scope="row">{{ parmition.resouresName }}</th>
                                            <th><input v-model="parmition.read" type="checkbox"></th>
                                            <th><input v-model="parmition.write" type="checkbox"></th>
                                            <th><input v-model="parmition.update" type="checkbox"></th>
                                            <th><input v-model="parmition.delete" type="checkbox"></th>
                                        </tr>
                                    </tbody>
                                </table>
                                <button type="submit" :loading="isSending" :disabled="isSending" @click="asseindRole" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- Row -->
        </div><!-- Main Wrapper -->




    </div>
</template>

<script>
    export default {
        mounted() {
            this.getRole();
        },
        data(){
          return{
            form:{
              name: null,
            },
            roles:{},
            role_id: null,
            parmitions: [
                {resouresName: 'blogs', read: true, write: false, update: false, delete: false, name: 'blogs'},
                {resouresName: 'role', read: false, write: false, update: false, delete: false, name: 'role'},
            ],
            parmitionsFress: [
                {resouresName: 'blogs', read: true, write: false, update: false, delete: false, name: 'blogs'},
                {resouresName: 'role', read: false, write: false, update: false, delete: false, name: 'role'},
            ],
            isSending: false,
          }
        },
        methods:{
            getRole(){
                axios.get('/api/role')
                .then(response => {
                  this.roles = response.data;
                  if (response.data.length) {
                    this.role_id = response.data[0].id
                    if (response.data[0].permission) {
                        this.parmitions = JSON.parse(response.data[0].permission) 
                    }
                  }
                })
                .catch(e => { console.log(e) })
            },
            asseindRole(){
                if (this.role_id!='') {
                    let permission = JSON.stringify(this.parmitions)
                    axios.post('/api/role_assent',{permission: permission, role_id: this.role_id})
                    .then(response=>{
                        this.getRole();
                    })
                    this.message = '';
                }
            },
            changeAdmin(){
                let index = this.roles.findIndex(role => role.id == this.role_id)
                let permition = this.roles[index].permission
                if (!permition) {
                    this.parmitions = this.parmitionsFress
                }else{
                    this.parmitions = JSON.parse(permition) 
                }
            }
        }
    }
</script>
