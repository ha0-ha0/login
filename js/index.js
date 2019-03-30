
new Vue ({
    el: '#mainWrap',
    data: {
        activeNum : '1',
        isActive: false
    },
    methods: {
        isSelect: function ( num ) {
            this.activeNum = num;
            isActive = true;
        },
        currentNum: function ( num ) {
            return this.activeNum == num;
        }
    }

})
