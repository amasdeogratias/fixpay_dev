<template>
    <div id="">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Attributes Values</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="value" class="control-label">Value</label>
                    <input type="text" name="value" id="value" class="form-control" placeholder="Enter attribute value" v-model="value">
                </div>
                <div class="form-group">
                    <label for="price" class="control-label">Price</label>
                    <input type="text" name="price" id="price" class="form-control" placeholder="Enter attribute price" v-model="price">
                </div>
            </div>
            <div class="card-footer">
                <div class="row d-print-none mt-2">
                    <div class="col-12 text-right">
                        <button class="btn btn-success" type="submit" @click.stop="saveValue()" v-if="addValue">
                            <i class="fa fa-fw fa-lg fa-check-circle"></i>Save
                        </button>
                        <button class="btn btn-success" type="submit" @click.stop="updateValue()" v-if="!addValue">
                            <i class="fa fa-fw fa-lg fa-check-circle"></i>Update
                        </button>
                        <button class="btn btn-primary" type="submit" @click.stop="reset()" v-if="!addValue">
                            <i class="fa fa-fw fa-lg fa-check-circle"></i>Reset
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Option Values</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead>
                        <tr class="text-center">
                            <th>#</th>
                            <th>Value</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="value in values">
                            <td style="width: 25%" class="text-center">{{ value.id}}</td>
                            <td style="width: 25%" class="text-center">{{ value.value}}</td>
                            <td style="width: 25%" class="text-center">{{ value.price}}</td>
                            <td style="width: 25%" class="text-center">
                                <button class="btn btn-sm btn-primary" @click.stop="editAttributeValue(value)">
                                    <i class="fa fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-danger" @click.stop="deleteAttributeValue(value)">
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
        name: "attribute-values",
        props: ['attributeid'],
        data(){
            return {
                values: [],
                value: '',
                price: 0,
                currentId: '',
                addValue: true,
                key: 0
            }
        },
        created: function() {
            this.loadValues();
        },
        methods: {
            loadValues() {
                let attributeId = this.attributeid;
                let _this = this;
                axios.post('/admin/attributes/get-values', {
                    id:attributeId
                }).then (function(response){
                    _this.values = response.data;
                }).catch(function(error){
                    console.log(error);
                });
            },
            saveValue() {
                if(this.value === ''){
                    this.$swal('Error', 'Value for attribute is required', {
                        icon: "error",
                    });
                }else {
                    let attributeId = this.attributeid;
                    let _this = this;
                    axios.post('/admin/attributes/add-values', {
                        id: attributeId,
                        value: _this.value,
                        price: _this.price,
                    },
                    { headers:{'Content-Type':'application/json'}

                    }).then(function(response) {
                        console.log(response)
                        _this.values.push(response.data);
                        _this.resetValue();
                        _this.$swal("Success! Value added successfully!", {
                            icon: "success",
                        });
                    }).catch(error => {
                        console.log(error);
                    });
                }
            },
            editAttributeValue(value) {
                this.addValue = false;
                this.value = value.value;
                this.price = value.price;
                this.currentId = value.id;
                this.key = this.values.indexOf(value);
            },
            updateValue() {
                if(this.value === '') {
                    this.$swal("Error, Value for attribute is required.", {
                        icon:'error',
                    });
                } else {
                    let attributeId = this.attributeid;
                    let _this = this;
                    axios.post('/admin/attributes/update-values', {
                        id: attributeId,
                        value: _this.value,
                        price: _this.price,
                        valueId: _this.currentId
                    }).then(function(response) {
                        _this.values.splice(_this.key, 1);
                        _this.resetValue();
                        _this.values.push(response.data);
                        _this.$swal("Success! Value updated successfully!", {
                            icon: "success",
                        });
                    }).catch(error => {
                        console.log(error);
                    });
                }
            },
            deleteAttributeValue(value) {
                this.$swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this attribute value!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,

                }).then((willDelete) => {
                    if (willDelete) {
                        this.currentId = value.id;
                        this.key = this.values.indexOf(value);
                        let _this = this;

                        axios.post('/admin/attributes/delete-values', {
                            id: _this.currentId
                        }).then(function(response) {
                            if (response.data.status === 'success') {
                                _this.values.splice(_this.key, 1);
                                _this.resetValue();
                                _this.$swal("Success! Option value has been deleted!", {
                                    icon: "success",
                                });
                            }else {
                                _this.$swal("Your option value not deleted!");
                            }
                        }).catch(error => {
                            console.log(error);
                        });
                    }  else {
                        this.$swal("Your option value not deleted!");
                    }
                })
            },
            resetValue() {
                this.value = '';
                this.price = '';
            },
            reset() {
                this.addValue = true;
                this.resetValue();
            }
        }
    }
</script>
