<template>
    <div class="container">
        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
            <tr>
                <th>STT</th>
                <th>Update</th>
                <th>Time</th>
                <th>Todo</th>
                <th>Done</th>
            </tr>
            </thead>
            <tbody>

            <tr class="gradeU" v-for="(todo,index) in lstTodo">
                <td>{{index}}</td>
                <td>
                    <button v-on:click="removeCate(this,todo.id)">
                        <i class="material-icons">
                            delete
                        </i>
                    </button>
                </td>
                <td>
                    {{todo.category.name}}
                </td>
                <td>{{todo.content}}</td>
                <td>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input"
                               id="exampleCheck1">
                    </div>

                </td>
            </tr>

            </tbody>
        </table>
        <!--{{ $todos->links() }}-->
    </div>

</template>

<script>
    export default {
        data() {
            return {
                lstTodo: []
            }
        },
        created() {
            this.getListProducts();
        },
        methods: {
            getListProducts() {
                axios.get('gettodo')
                    .then(response => {
                        this.lstTodo = response.data.data;
                    }).catch(error => {
                    console.log(error);
                })
            },
            removeCate(index,id){
                if(confirm("Bạn có thực sự muốn xóa")){
                    axios.get('delete/'+id)
                        .then(()=>{
                            alert('Xóa thành công');
                            this.lstTodo.splice(index,1);
                        }).catch(error=>{
                            console.log(error);
                    })
                }else{

                }
            }
        }
    }
</script>
