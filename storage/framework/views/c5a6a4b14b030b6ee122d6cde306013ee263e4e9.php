<el-table
        :data="tableData"  v-loading.body="loading" element-loading-text="拼命加载中"
        style="width: 100%">
    <el-table-column type="expand" class="table table-striped b-t b-light">
        <template scope="props">
            <el-form label-position="left" inline class="demo-table-expand">
                <el-form-item label="订单金额">
                    <span>{{ props.row.vote.order_vote }}元</span>
                </el-form-item>
                <el-form-item label="活动打赏金额">
                    <span>{{ props.row.vote.activity_vote }}元</span>
                </el-form-item>
                <el-form-item label="直播间打赏金额">
                    <span>{{ props.row.vote.live_vote }}元</span>
                </el-form-item>
            </el-form>
            <el-form label-position="left" inline class="demo-table-expand">
                <el-form-item label="订单数量">
                    <span>{{ props.row.vote.order_num }}个</span>
                </el-form-item>
                <el-form-item label="活动打赏数量">
                    <span>{{ props.row.vote.activity_num }}个</span>
                </el-form-item>
                <el-form-item label="直播间打赏数量">
                    <span>{{ props.row.vote.live_num }}个</span>
                </el-form-item>
                <el-form-item label="点赞数">
                    <span>{{ props.row.vote.praise_num }}个</span>
                </el-form-item>
            </el-form>
            <el-form label-position="left" inline class="demo-table-expand">
                <el-form-item label="优惠券码" style="width: 100%">
                    <span>{{ props.row.coupon?props.row.coupon.replace(/,/g, '&nbsp;&nbsp;|&nbsp;&nbsp;'):'暂无' }}</span>
                </el-form-item>
            </el-form>
            <el-form label-position="left" inline class="demo-table-expand">
                <el-form-item label="已配组件" style="width: 100%">
                    <span v-for="item in props.row.modules" style="padding-right: 7px;">
                        {{ {activityCheck:'活动页投票组件',dongtaiCheck:'动态打赏组件',likeCheck:'点赞组件',liveCheck:'直播间打赏组件',orderCheck:'订单组件'}[item.name] }}
                    </span>
                </el-form-item>
            </el-form>
        </template>
    </el-table-column>
    <el-table-column
            label="ID"
            prop="id" width="90">
    </el-table-column>
    <el-table-column
            label="活动名称"
            prop="static_tmp.site_name" width="250">
    </el-table-column>
    <el-table-column
            label="活动类型"
            prop="type" align="center" width="155">
        <template scope="scope">
            {{['','默认','拉新','存展示'][scope.row.type]}}
        </template>
    </el-table-column>
    <el-table-column
            label="需要审核"
            prop="status" align="center" width="153">
        <template scope="scope">
            {{scope.row.status==1?'是':'否'}}
        </template>
    </el-table-column>
    <el-table-column
            label="动态表名"
            prop="table_name" width="300">
    </el-table-column>
    <el-table-column
            label="活动开始时间"
            prop="start_time" width="152">
        <template scope="scope">
            {{(new Date(scope.row.start_time * 1000)).Format('yyyy-MM-dd hh:mm:ss')}}
        </template>
    </el-table-column>
    <el-table-column
            label="活动结束时间"
            prop="end_time" width="152">
        <template scope="scope" >
            {{(new Date(scope.row.end_time * 1000)).Format('yyyy-MM-dd hh:mm:ss')}}
        </template>
    </el-table-column>
    <el-table-column
            label="创建时间"
            prop="create_time" width="152">
        <template scope="scope">
            {{(new Date(scope.row.create_time * 1000)).Format('yyyy-MM-dd hh:mm:ss')}}
        </template>
    </el-table-column>
    <el-table-column label="操作">
        <template scope="scope">
            <el-button
            size="small"
            type="info"
            @click="handleEdit(scope.$index,scope.row.id)">查看</el-button>
            <el-button
                    size="small"
            @click="redirectUrl('<?php echo e(url('/activity')); ?>'+'/'+scope.row.id+'/edit')">编辑</el-button>
            <el-button
                    size="small"
                    type="danger"
            @click="deleteConfirm(scope.$index,scope.row,'111')">删除</el-button>
        </template>
    </el-table-column>
</el-table>