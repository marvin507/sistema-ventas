<template>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">Productos</div>

                    <div class="card-body">
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#crear">Nuevo Producto</button>
<div class="table-responsive">
  <table class="table table-hover mt-2">
    <thead>
      <tr>
        <th scope="col">Nombre</th>
        <th scope="col">Código</th>
        <th scope="col">Cantidad</th>
        <th scope="col">Precio</th>
        <th scope="col">Aciones</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for='product in products'>
        <td>{{ product.nombre }}</td>
        <td>{{ product.codigo }}</td>
        <td>{{ product.cantidad }}</td>
        <td>{{ product.precio }}</td>
        <td>
          <div class="btn-group">
            <button type="button" class="btn btn-warning btn-sm mr-1" v-on:click="editProduct(product)">Editar</button>
            <button type="button" class="btn btn-danger btn-sm" v-on:click.prevent="deleteProduct(product.id)">Eliminar</button>
          </div>
        </td>

      </tr>

    </tbody>
  </table>
</div>


                    </div>
                </div>
            </div>
        </div>
        <!-- crear -->
        <form class="form-horizontal" method="post" autocomplete="off" v-on:submit.prevent="storeProduct">
        <div class="modal fade" id="crear">
          <div class="modal-dialog">
            <div class="modal-content">

              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">Nuevo Producto</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>



              <!-- Modal body -->
              <div class="modal-body">

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="textinput">Nombre</label>
                        <div class="col-md-12">
                        <input v-model="newProduct.nombre" type="text" placeholder="nombre del producto" class="form-control input-md">
                      <span class="help is-danger" v-for='error in errors' v-text='error.nombre'></span>
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="textinput">Codigo</label>
                        <div class="col-md-12">
                        <input v-model="newProduct.codigo" type="text" placeholder="codigo del producto" class="form-control input-md">
                      <span class="help is-danger" v-for='error in errors' v-text='error.codigo'></span>
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="textinput">Cantidad</label>
                        <div class="col-md-12">
                        <input v-model="newProduct.cantidad" type="text" placeholder="cantidad del producto" class="form-control input-md">
                      <span class="help is-danger" v-for='error in errors' v-text='error.cantidad'></span>
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="textinput">Precio</label>
                        <div class="col-md-12">
                        <input v-model="newProduct.precio" type="text" placeholder="precio del producto" class="form-control input-md">
                      <span class="help is-danger" v-for='error in errors' v-text='error.precio'></span>
                        </div>
                    </div>



              </div>

              <!-- Modal footer -->
              <div class="modal-footer">

                <button type="submit" class="btn btn-primary">Guardar</button>
              </div>

            </div>
          </div>
        </div>
        </form>
        <!-- crear -->
        <!-- editar -->
        <form class="form-horizontal" method="post" autocomplete="off" v-on:submit.prevent="updateProduct(fillProduct.id)">
        <div class="modal fade" id="editar">
          <div class="modal-dialog">
            <div class="modal-content">

              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">Nuevo Producto</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>



              <!-- Modal body -->
              <div class="modal-body">

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="textinput">Nombre</label>
                        <div class="col-md-12">
                        <input v-model="fillProduct.nombre" type="text" placeholder="nombre del producto" class="form-control input-md">
                      <span class="help is-danger" v-for='error in errors' v-text='error.nombre'></span>
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="textinput">Código</label>
                        <div class="col-md-12">
                        <input v-model="fillProduct.codigo" type="text" placeholder="codigo del producto" class="form-control input-md">
                      <span class="help is-danger" v-for='error in errors' v-text='error.codigo'></span>
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="textinput">Cantidad</label>
                        <div class="col-md-12">
                        <input v-model="fillProduct.cantidad" type="text" placeholder="cantidad del producto" class="form-control input-md">
                      <span class="help is-danger" v-for='error in errors' v-text='error.cantidad'></span>
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="textinput">Precio</label>
                        <div class="col-md-12">
                        <input v-model="fillProduct.precio" type="text" placeholder="precio del producto" class="form-control input-md">
                      <span class="help is-danger" v-for='error in errors' v-text='error.precio'></span>
                        </div>
                    </div>


              </div>

              <!-- Modal footer -->
              <div class="modal-footer">

                <button type="submit" class="btn btn-success">Actualizar</button>
              </div>

            </div>
          </div>
        </div>
        </form>
        <!-- editar -->
    </div>

</template>

<script>

import toastr from 'toastr'

    export default {
        mounted() {
            this.getProduct();
        },
        data(){
          return{
            products:[],
            newProduct:{
              nombre: '',
              codigo: '',
              cantidad: '',
              precio:''

            },
            errors:[],
            fillProduct:{
              nombre: '',
              codigo: '',
              cantidad: '',
              precio:''
            }

          }//fin return
        },
        methods:{
          getProduct(){

            axios.get('api/productos').then(response=>{
              this.products = response.data
            })
          },
          storeProduct(){
            axios.post('api/productos',this.newProduct)
            .then(response=>{
              $('#crear').modal('hide')
              this.getProduct()
              this.newProduct = {nombre: '', codigo: '', cantidad: '', precio:''}
              toastr.success("datos guardados satisfactoriamente")
            }).catch(error => this.errors = error.response.data)
          },
          editProduct(product){
              $("#editar").modal('show');
              this.fillProduct = product
          },
          updateProduct(id){
            var url = "api/productos/"+id;
            axios.put(url, this.fillProduct).then(response=>{
              $("#editar").modal('hide')
              this.getProduct()
              this.fillProduct = {nombre:'',codigo:'', cantidad:'', precio:''}
              toastr.success("datos actualizados exitosamente")
            }).catch(error=>this.errors = error.response.data)
          },
          deleteProduct(id){
            var url = 'api/productos/'+id;
            if (confirm("estas seguro?")) {
                axios.delete(url).then(response=>{
                this.getProduct()
                toastr.error("datos eliminados")
              })
            }//fin if
          }//fin metodo deleteProduct
        }
    }
</script>
