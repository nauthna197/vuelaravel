<template>
    <div class="container">
        <div class="row justify-content-center">
                <select class="form-control m-bot15" name="category_id">
                    <option :value="item.id" v-for="item in listProducts">{{item.name}}</option>
                </select>
        </div>
    </div>

</template>

<script>
    export default {
        data() {
            return {
                category: {
                    id: '',
                    name: 0
                },
                listProducts: []
            }
        },
        created() {
            this.getListProducts();
        },
        methods: {
            getListProducts() {
                axios.get('getcate')
                    .then(response => {
                        this.listProducts = response.data;
                    }).catch(error => {
                    console.log(error);
                })
            }
        }
    }
</script>
