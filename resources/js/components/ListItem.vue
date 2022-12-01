<template>
    <div class="item">
        <input
            type="checkbox"
            name=""
            :id="item.id"
            @change="updateCheck()"
            v-model="item.completed"
            :checked="item.completed"
        />

        <span :class="[item.completed ? 'completed' : '', 'itemText']">{{
            item.name
        }}</span>
        <button @click="removeItem()">
            <font-awesome-icon
                v-on:click="addItem"
                icon="fa-regular fa-trash-can"
            />
        </button>
    </div>
</template>

<script>
export default {
    props: ["item"],
    methods: {
        updateCheck() {
            axios
                .put("api/item/" + this.item.id, {
                    item: this.item,
                })
                .then((result) => {
                    if (result.status == 200) {
                        this.$emit("itemchanged");
                    }
                })
                .catch((err) => {
                    console.log(err);
                });
        },
        removeItem() {
            axios
                .delete("api/item/" + this.item.id, {
                    item: this.item,
                })
                .then((result) => {
                    if (result.status == 200) {
                        this.$emit("itemchanged");
                    }
                })
                .catch((err) => {
                    console.log(err);
                });
        },
    },
};
</script>

<style scoped>
.completed {
    text-decoration: line-through;
    color: #999999;
}

.itemText {
    width: 100%;
    margin-left: 20px;
}

.item {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-bottom: 10px;
    background: lightgreen;
    padding: 15px;
}
</style>
