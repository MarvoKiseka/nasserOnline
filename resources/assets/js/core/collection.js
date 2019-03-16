import InfiniteLoading from 'vue-infinite-loading'

export default {
    data() {
        return {
            search: '',
            filter: '',
            items: [],
            page: 1,
            url: '',
            infiniteId: +new Date()
        }
    },

    watch: {
        search() {
            this.filterChanged()
        }
    },
    
    mounted(){
     
    },
    methods: {
        addItems(items) {
            for (let index in items) {
                this.items.push(items[index]);
            }
        },
        deleteItem(itemId) {
            let foundItem = this.items.find(item => item.id === itemId);
            this.items.splice(this.items.indexOf(foundItem), 1);
        },
        emptyItems() {
            this.items = [];
            this.items.length = 0;
        },

        addItem(item) {
            this.items.unshift(item);
        },

        updateItem(data) {
            let foundItem = this.items.find(item => item.id === data.id);

            for (let i in data) {
                foundItem[i] = data[i];
            }
        },

        changeFilter(filter) {
            console.log(filter)
            this.search = '',
            this.filter = filter;
            this.filterChanged();
        },

        async infiniteHandler($state) {
            try {
                let res = await axios.get(this.url, {
                    params: {
                        search:this.search,
                        page: this.page,
                        filter: this.filter
                    },
                });
                this.storeData(res, $state)
            } catch (e) {
                console.log(e);
            }
        },

        storeData({data}, $state) {
            if (data.data.length) {
                this.page += 1;
                this.addItems(data.data);
                $state.loaded();
            }

            if(data.data.length ==0){
                $state.complete()
            }

            if (data.to === data.total) {
                $state.complete()
            }
        },

        filterChanged(){
            this.emptyItems();
            this.page = 1;
            this.infiniteId += 1;
        },
    },

    components: {
        InfiniteLoading
    },
}
