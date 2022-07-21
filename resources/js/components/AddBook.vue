<template>
    <div>
        <h4 class="text-center">Add Profile</h4>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="addBook">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" v-model="book.name">
                    </div><br>
                    <div class="form-group">
                        <label>Surname</label>
                        <input type="text" class="form-control" v-model="book.surname">
                    </div><br>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" class="form-control" v-model="book.phone">
                    </div><br>
                    <div class="form-group">
                        <label>URL Picture</label>
                        <input type="text" class="form-control" v-model="book.urlpicture">
                    </div><br>                   
                    <button type="submit" class="btn btn-primary">Add Profile</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            book: {}
        }
    },
    methods: {
        addBook() {
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.post('/api/books/add', this.book)
                    .then(response => {
                        this.$router.push({name: 'books'})
                    })
                    .catch(function (error) {
                        console.error(error);
                    });
            })
        }
    },
    beforeRouteEnter(to, from, next) {
        if (!window.Laravel.isLoggedin) {
            window.location.href = "/";
        }
        next();
    }
}
</script>
