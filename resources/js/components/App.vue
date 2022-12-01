<template>
    <div class="todoListContainer">
        <div class="heading">
            <h2 class="title">Todo List</h2>
            <add-item-form v-on:reloadlist="getItems()" />
        </div>
        <item-list :items="items" v-on:reloadlist="getItems()" />
    </div>
</template>

<script>
import AddItemForm from "./AddItemForm.vue";
import ItemList from "./ItemList.vue";
export default {
    components: { AddItemForm, ItemList },
    data() {
        return {
            items: [],
        };
    },
    methods: {
        getItems() {
            axios
                .get("api/items")
                .then((result) => {
                    this.items = result.data;
                })
                .catch((err) => {
                    console.log(err);
                });
        },
    },
    created() {
        this.getItems();
    },
};
</script>

<style scoped>
.todoListContainer {
    width: 350px;
    margin: auto;
}

.heading {
    background: #e6e6e6;
    padding: 15px;
    margin-bottom: 20px;
}

.title {
    text-align: center;
}
</style>
