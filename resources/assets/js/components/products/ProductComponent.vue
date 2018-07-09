<template>
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card card-default">
          <div class="card-header">Productos
          </div>
          <div class="card-body">
            <button type="button" class="btn btn-primary btn-cuadrado" data-toggle="modal" data-target="#crear">Nuevo Producto
              <i class="fas fa-plus"></i>
            </button>
            <div class="table-responsive">
              <table class="table table-hover mt-2">
                <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Código</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Categoría</th>
                    <th width="10%">Aciones</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for='product in products'>
                    <td>{{ product.nombre }}</td>
                    <td>{{ product.codigo }}</td>
                    <td>{{ product.cantidad }}</td>
                    <td>{{ product.precio }}</td>
                    <td v-if="product.category == null">no hay datos</td>
                    <td v-else="product.category">{{product.category.name}}</td>
                    <td>
                      <div class="btn-group">
                        <button type="button" class="btn btn-info btn-sm btn-cuadrado mr-2" v-on:click="showProduct(product.id)">
                          <i class="fas fa-eye"></i>
                        </button>
                        <button type="button" class="btn btn-warning btn-sm btn-cuadrado mr-2" v-on:click="editProduct(product)">
                          <i class="fas fa-pencil-alt"></i>
                        </button>
                        <button type="button" class="btn btn-danger btn-sm btn-cuadrado" v-on:click.prevent="deleteProduct(product.id)">
                          <i class="fas fa-trash-alt"></i>
                        </button>
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
            <span class="text-danger" v-for='error in errors' v-text='error.nombre'></span>
          </div>
        </div>
<!-- Text input-->
<div class="form-group">
<label class="col-md-4 control-label" for="textinput">Codigo</label>
<div class="col-md-12">
<input v-model="newProduct.codigo" type="text" placeholder="codigo del producto" class="form-control input-md">
<span class="text-danger" v-for='error in errors' v-text='error.codigo'></span>
</div>
</div>
<!-- Text input-->
<div class="form-group">
<label class="col-md-4 control-label" for="textinput">Cantidad</label>
<div class="col-md-12">
<input v-model="newProduct.cantidad" type="text" placeholder="cantidad del producto" class="form-control input-md">
<span class="text-danger" v-for='error in errors' v-text='error.cantidad'></span>
</div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Precio</label>
  <div class="col-md-12">
    <input v-model="newProduct.precio" type="text" placeholder="precio del producto" class="form-control input-md">
    <span class="text-danger" v-for='error in errors' v-text='error.precio'></span>
  </div>
</div>
<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic">Categorías</label>
  <div class="col-md-12">
    <select v-model="newProduct.category_id" class="form-control">
      <option v-for="categoria in categorias" v-bind:value="categoria.id">{{ categoria.name }}</option>
    </select>
  </div>
</div>
</div>
<!-- Modal footer -->
<div class="modal-footer">
<button type="submit" class="btn btn-primary btn-cuadrado">Guardar</button>
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
<span class="text-danger" v-for='error in errors' v-text='error.nombre'></span>
</div>
</div>
<!-- Text input-->
<div class="form-group">
<label class="col-md-4 control-label" for="textinput">Código</label>
<div class="col-md-12">
<input v-model="fillProduct.codigo" type="text" placeholder="codigo del producto" class="form-control input-md">
<span class="text-danger" v-for='error in errors' v-text='error.codigo'></span>
</div>
</div>
<!-- Text input-->
<div class="form-group">
<label class="col-md-4 control-label" for="textinput">Cantidad</label>
<div class="col-md-12">
<input v-model="fillProduct.cantidad" type="text" placeholder="cantidad del producto" class="form-control input-md">
<span class="text-danger" v-for='error in errors' v-text='error.cantidad'></span>
</div>
</div>
<!-- Text input-->
<div class="form-group">
<label class="col-md-4 control-label" for="textinput">Precio</label>
<div class="col-md-12">
<input v-model="fillProduct.precio" type="text" placeholder="precio del producto" class="form-control input-md">
<span class="text-danger" v-for='error in errors' v-text='error.precio'></span>
</div>
</div>
<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic">Categorías</label>
  <div class="col-md-12">
    <select v-model="fillProduct.category_id" class="form-control">
      <option v-for="categoria in categorias" v-bind:value="categoria.id">{{ categoria.name }}</option>
    </select>
  </div>
</div>

</div>
<!-- Modal footer -->
<div class="modal-footer">
<button type="submit" class="btn btn-success btn-cuadrado">Actualizar</button>
</div>
</div>
</div>
</div>
</form>
<!-- editar -->
<!-- ver -->
<div class="modal fade" id="ver">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Información del Producto</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">



      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>

    </div>
  </div>
</div>

</div>
</template>
<script>

import toastr from 'toastr'

    export default {
        mounted() {
            this.getProduct();
            this.getCategories();
        },
        data(){
          return{
            categorias:[],
            products:[],
            newProduct:{
              nombre: '',
              codigo: '',
              cantidad: '',
              precio:'',
              category_id:''

            },
            errors:[],
            fillProduct:{
              nombre: '',
              codigo: '',
              cantidad: '',
              precio:'',
              category_id:''
            },
            viewProduct:[]

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
              this.newProduct = {nombre: '', codigo: '', cantidad: '', precio:'', category_id:''}
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
              this.fillProduct = {nombre:'',codigo:'', cantidad:'', precio:'', category_id:''}
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
          },//fin metodo deleteProduct
          showProduct(id){
            var url = "api/productos/"+id;
            $("#ver").modal('show');
            axios.get(url).then(response=>{
              this.viewProduct = response.data
            })
          },
          getCategories(){
            var url = "api/categorias";
            axios.get(url).then(response=>{
              this.categorias = response.data
            })
          }
        }
    }
</script>
<style>
.show thead {
float: left;
}

.show thead th {
display: block;
}

.show tbody {
float: left;
}
</style>
