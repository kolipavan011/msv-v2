import { defineStore } from 'pinia'

export const useYoutubePagesStore = defineStore('youtubePages', {
    state: () => ({
        pages:[]
    }),
    getters: {
        getPage(state) {
            return (pageToken) => {
                return state.pages.filter( (page) => page.pageToken === pageToken)
            }
        },
    },
    actions: {
        addPage(page) {
            let pagesTokens = this.pages.map(i => i.pageToken);
            if (!pagesTokens.includes(page.pageToken)) this.pages.push(page);
            return page;
        },
        removePage(pageToken) {
            let pagesTokens = this.pages.map(i => i.pageToken);
            let index = this.pages.indexOf(pageToken);
            if (index > -1) this.pages.splice(index, 1);
        },
        pageExist(pageToken) {
            let pagesTokens = this.pages.map(i => i.pageToken);
            return (pagesTokens.includes(pageToken));
        },
        resetPages() {
            this.pages.length = 0;
        }
        
    }
})