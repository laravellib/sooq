@extends ('dashboard.layout.app')

@section ('content')

<div class="row">
    
    <div class="col-md-12">
        
        <!-- Sessions Messages -->
        @if (Session::has('success'))
        <div class="custom-alerts alert alert-success fade in">
            {{ Session::get('success') }}
        </div>
        @endif

        @if (Session::has('error'))
        <div class="custom-alerts alert alert-danger fade in">
            {{ Session::get('error') }}
        </div>
        @endif

        <div class="portlet light ">

            <div class="portlet-title tabbable-line">
                <div class="caption caption-md">
                    <span class="caption-subject font-blue bold uppercase">اشعارات المستخدمين</span>
                </div>
            </div>

            <div class="portlet-body">
                <table class="table table-hover table-outline m-b-0 hidden-sm-down">
                    <thead class="thead-default">
                        <tr>
                            <th class="text-center"><i class="icon-people"></i></th>
                            <th>User</th>
                            <th class="text-center">حالة المستخدم</th>
                            <th class="text-center">تاريخ</th>
                            <th class="text-center">حالة الاشعارات</th>
                            <th class="text-center">خيارات</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if (count($notifications) > 0)
                    @foreach ($notifications as $notification)
                    <tr>

						<!-- User Avatar -->
                        <td class="text-center">
                            <div class="avatar">
                                <img src="{{ Profile::picture($notification->user_id) }}" class="img-avatar" alt="{{ Helper::username_by_id($notification->user_id) }}">
                            </div>
                        </td>

                        <!-- User Info -->
                        <td>
                            <a href="{{ Protocol::home() }}/dashboard/users/details/{{ Helper::username_by_id($notification->user_id) }}">{{ Profile::full_name($notification->user_id) }}</a>
                            <div class="small text-muted">
                                <span>{{ Helper::username_by_id($notification->user_id) }}</span> | {{ Helper::date_ago($notification->created_at) }}
                            </div>
                        </td>

                        <!-- User Status -->
                        <td class="text-center">
                            @if (Profile::isActive($notification->user_id))
                            <span class="badge badge-success badge-roundless"> نشيط </span>
                            @else 
                            <span class="badge badge-danger badge-roundless"> قيد الانتظار </span>
                            @endif
                        </td>

                        <!-- Notification Date -->
                        <td class="text-center text-muted">
                            {{ Helper::date_ago($notification->created_at) }}
                        </td>

                        <!-- Notification Status -->
                        <td class="text-center">
                            @if ($notification->is_read)
                            <span class="badge badge-default badge-roundless"> مقروء </span>
                            @else 
                            <span class="badge badge-info badge-roundless"> غير مقروء </span>
                            @endif
                        </td>
                            
                        <!-- Options -->
                        <td class="text-center">
                            <div class="btn-group">
                                <i style="color: #405a72;font-size: 18px;cursor: pointer;" class="icon-settings dropdown-toggle" data-toggle="dropdown"></i>

                                <ul class="dropdown-menu pull-right" role="menu">
                                    @if (!Profile::isActive($notification->user_id))
                                    <li>
                                        <a href="{{ Protocol::home() }}/dashboard/users/active/{{ Helper::username_by_id($notification->user_id) }}">
                                            <i class="glyphicon glyphicon-ok"></i> مستخدم نشط</a>
                                    </li>
                                    @else 
                                    <li>
                                        <a href="{{ Protocol::home() }}/dashboard/users/inactive/{{ Helper::username_by_id($notification->user_id) }}">
                                            <i class="glyphicon glyphicon-remove"></i> مستخدم غير نشط</a>
                                    </li>
                                    @endif
                                    <li class="divider"> </li>
                                    <li>
                                        <a style="color: #dd2c2c;text-transform: uppercase;" href="{{ Protocol::home() }}/dashboard/notifications/users/delete/{{ $notification->id }}">
                                            <i style="color: #dd2c2c;" class="glyphicon glyphicon-trash"></i> حذف الإشعار</a>
                                    </li>
                                </ul>
                            </div>
                        </td>

                    </tr>
                    @endforeach
                    @endif
                    </tbody>
                </table>

                @if (count($notifications))
                <div class="text-center">
                    {{ $notifications->links() }}
                </div>
                @endif

            </div>
        </div>

	</div>
</div>

@endsection