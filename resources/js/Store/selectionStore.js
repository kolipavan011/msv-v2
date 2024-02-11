import { defineStore } from "pinia";

export const useSelectionStore = defineStore('selection', {
    state: () => ({
        list: [],
        canSelect: false
    }),
    actions: {
        toggle(item) {
            if (!this.list.includes(item)) {
                this.list.push(item);
            } else {
                this.removeItem(item);
            }
        },
        removeItem(item) {
            if (this.list.includes(item)) this.list.splice(this.list.indexOf(item), 1);
        },
        resetItem() {
            this.list.length = 0;
        },
        toggleSelect() {
            this.canSelect = !this.canSelect
        }
    }
})