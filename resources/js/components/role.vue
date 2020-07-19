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
                                    <button data-toggle="modal" data-target="#RoleAdd" class="btn btn-success btn-sm float-right">Add New Role</button>
                                </div>
                            </div>
                            
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th width="5%">#</th>
                                            <th width="70%">Role Type</th>
                                            <th>Created At</th>
                                            <th width="15%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="role in roles" :key="role.id">
                                            <th scope="row">{{ role.id }}</th>
                                            <td>{{ role.name }}</td>
                                            <td>{{ role.created_at }}</td>
                                            <td>
                                                <button class="btn-info btn-sm btn">Edit</button>
                                                <button class="btn-danger btn-sm btn">Delete</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- Row -->
        </div><!-- Main Wrapper -->





<div class="modal fade" id="RoleAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form @submit.prevent="RoleInsert">
          <div class="modal-body">
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Role Name:</label>
                <input type="text" class="form-control" id="recipient-name" v-model="form.name">
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-denger"  data-dismiss="modal">Censel</button>
            <button type="submit" class="btn btn-primary">Send message</button>
          </div>
        </form>
    </div>
  </div>
</div>



    </div>
</template>

<script>
    export default {
        mounted() {
           this.getData();
        },
        data(){
          return{
            form:{
              name: null,
            },
            roles:{}
          }
        },
        methods:{
            getData(){
                axios.get('/api/role')
                .then(response => {
                  this.roles = response.data;
                })
                .catch(e => { console.log(e) })
            },
            RoleInsert(){
                axios.post('/api/role',this.form)
                .then(response => {
                  this.getData();
                })
                .catch(error => this.errors = error.response.data.errors)
            },
        }
    }
</script>
