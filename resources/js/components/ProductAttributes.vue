<template>
    <div>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Attributes</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="parent">Select an Attribute <span class="m-l-5 text-danger"> *</span></label>
                            <select id=parent class="form-control custom-select mt-15" v-model="attribute" @change="selectAttribute(attribute)">
                                <option :value="attribute" v-for="attribute in attributes"> {{ attribute.name }} </option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Product Attributes</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead>
                            <tr class="text-center">
                                <th>Value</th>
                                <th>Qty</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="pa in productAttributes">
                                <td style="width: 25%" class="text-center">{{ pa.value}}</td>
                                <td style="width: 25%" class="text-center">{{ pa.quantity}}</td>
                                <td style="width: 25%" class="text-center">{{ pa.price}}</td>
                                <td style="width: 25%" class="text-center">
                                    <button class="btn btn-sm btn-danger" @click="deleteProductAttribute(pa)">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
import axios from 'axios';
export default {
    name: "product-attributes",
    props: ["productid"],
    data() {
        return {
            productAttributes: [],
            attributes: [],
            attribute: {},
        }
    },

    created: function() {
        this.loadProductAttributes(this.productid);
    },
    methods: {
        loadProductAttributes(id) {
            let _this = this;
            axios.post('/admin/products/attributes', {
                id: id
            }).then(function(response){
                _this.productAttributes = response.data;
            }).catch((error) => {
                console.log(error);
            });
        },

        loadAttributes() {
            let _this = this;
            axios.get('/admin/products/attributes/load').then(function(response){
                _this.attributes = response.data;
            }).catch(function (error) {
                console.log(error);
            });
        },
    }
}
</script>
