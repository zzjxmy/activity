var activity_config = {
    //多个时间选择
    'activity_dates':{
        format: 'YYYY/MM/DD'
    },
    //单个时间选择
    'activity_date':{
        singleDatePicker: true,
        showDropdowns: true
    }
};

var activity_chat = {
    //近三十天分类收入折线图
    'activity_index_one':{
        datas:[
            {data: [ [1490025599000,7],[1490111999000,6.5],[1490198399000,12.5],[1490284799000,7],[1490371199000,8] ], label:'订单', points: { show: false, radius: 1}, splines: { show: false, tension: 0.4, lineWidth: 1, fill: 0.8 } },
            { data: [ [1490025599000,3],[1490111999000,22],[1490198399000,71],[1490284799000,15],[1490371199000,17] ], label:'活动页投票', points: { show: false, radius: 1}, splines: { show: false, tension: 0.4, lineWidth: 1, fill: 0.8 } },
            { data: [ [1490025599000,17],[1490111999000,6.5],[1490198399000,40],[1490284799000,21],[1490371199000,25] ], label:'直播间打赏', points: { show: false, radius: 1}, splines: { show: false, tension: 0.4, lineWidth: 1, fill: 0.8 } },
            { data: [ [1490025599000,6],[1490111999000,8],[1490198399000,8],[1490284799000,60],[1490371199000,3] ], label:'动态打赏', points: { show: false, radius: 1}, splines: { show: false, tension: 0.4, lineWidth: 1, fill: 0.8 } }
        ],
        row:{
            colors: ['#23b7e5', '#7266ba','#fad733','#27c24c'],
            align:'right',
            series: { shadowSize: 5},
            xaxis:{ mode: 'time',timeformat: '%m/%d',ticks:[[1490025599000,'03/21'],[1490111999000,'03/22'],[1490198399000,'03/23'],[1490284799000,'03/24'],[1490371199000,'03/25']],tickLength: 10, min: 1490025599000, max: 1490371199000},
            yaxis:{ font: { color: '#a1a7ac' } },
            grid: { hoverable: true, clickable: true, borderWidth: 0, color: '#dce5ec',labelMargin:0 },
            tooltip: true,
            tooltipOpts: { content: '%x  $%y.2',  defaultTheme: false, shifts: { x: 10, y: -25 } }
        }
    },
    'activity_index_two':{
        datas:[
                { data: [ [1,5.5],[2,6.5],[3,7],[4,8],[5,7.5],[6,7],[7,6.8],[8,7],[9,7.2],[10,7],[11,6.8],[12,7],[13,2.5],[14,3.5],[15,7],[16,7],[17,6],[18,7],[19,6.8],[20,5],[21,7],[22,8],[23,6.8],[24,7] ], lines: { show: true, lineWidth: 1, fill:true, fillColor: { colors: [{opacity: 0.2}, {opacity: 0.8}] } } }
            ],
        row:{
            colors: ['#e8eff0'],
                series: { shadowSize: 3 },
            xaxis:{ show:false },
            yaxis:{ font: { color: '#a1a7ac' } },
            grid: { hoverable: true, clickable: true, borderWidth: 0, color: '#dce5ec' },
            tooltip: true,
                tooltipOpts: { content: '%s of %x.1 is %y.4',  defaultTheme: false, shifts: { x: 10, y: -25 } }
        }
    },
    //首页总收入图标
    'activity_index_c':{
        datas:[60,40],
        row:{
            type:'pie', height:40, sliceColors:['#fad733','#fff']
        }
    }

};

var activity_datatable = {
    'dataTable':{
        'datas':{
            processing:true,
            serverSide:true,
            sAjaxSource: 'purview/index',
            aoColumns: [
                { mData: 'id' },
                { mData: 'name' },
                { mData: 'display_name' },
                { mData: 'description' },
                { mData: 'created_at' },
                { mData: 'updated_at' }
            ]
        }
    }
};