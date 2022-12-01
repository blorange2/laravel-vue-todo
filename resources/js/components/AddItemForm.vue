<template>
    <div class="addItem">
        <input type="text" name="" id="" v-model="item.name" />
        <font-awesome-icon
            v-on:click="addItem"
            icon="fa-regular fa-plus-square"
            :class="[item.name ? 'active' : 'inactive', 'plus']"
        />
    </div>
</template>

<script>
export default {
    data() {
        return {
            item: {
                name: "",
            },
        };
    },
    methods: {
        addItem() {
            if (this.item.name == "") {
                alert("NOOOOOOOOOOO");
            }

            axios
                .post("api/item/store", {
                    item: this.item,
                })
                .then((response) => {
                    if (response.status == 201) {
                        this.item.name = "";
                        this.$emit("reloadlist");
                    }
                })
                .catch((err) => {});
        },
    },
};
</script>

<style scoped>
.addItem {
    display: flex;
    justify-content: center;
    align-items: center;
}

input {
    background: #f7f7f7;
    outline: none;
    padding: 5px;
    margin: 10px;
    border: none;
}

.plus {
    font-size: 20px;
}

.active {
    color: #00ce25;
}

.inactive {
    color: red;
}
</style>
