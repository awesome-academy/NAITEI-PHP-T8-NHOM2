<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Orders UI Elements
    |--------------------------------------------------------------------------
    |
    | Text elements used specifically for orders interface
    |
    */

    // Page titles and headings
    'orders' => 'Đơn hàng',
    'order' => 'Đơn hàng',
    'order_id' => 'ID đơn hàng',
    'back_to_orders' => '← Quay lại đơn hàng',
    
    // Search and filter
    'search_orders_customers' => 'Tìm kiếm đơn hàng, khách hàng...',
    'all_statuses' => 'Tất cả trạng thái',
    'filter' => 'Lọc',
    'clear' => 'Xóa',
    'search_order_code' => 'Tìm mã đơn...',
    'order_date' => 'Ngày đặt',
    'order_amount' => 'Tổng tiền',
    'my_orders' => 'Đơn hàng của tôi',
    'no_orders' => 'Bạn chưa có đơn hàng nào.',
    'order_code' => 'Mã đơn',
    'order_details' => 'Chi tiết đơn hàng #',
    'payment_method' => 'Phương thức thanh toán',
    'order_date_colon' => 'Ngày đặt:',
    'products' => 'Sản phẩm',
    'product_not_exist' => 'Sản phẩm không còn tồn tại',
    
    // Status messages
    'no_orders_found' => 'Không tìm thấy đơn hàng nào',
    'try_adjusting_search' => 'Hãy thử điều chỉnh tiêu chí tìm kiếm hoặc lọc',
    'showing_orders' => 'Hiển thị từ :from đến :to trên tổng số :total đơn hàng',
    
    // Table headers
    'customer' => 'Khách hàng',
    'total' => 'Tổng',
    'status' => 'Trạng thái',
    'date' => 'Ngày',
    'actions' => 'Hành động',
    'view' => 'Xem',
    
    // Order details
    'update_order_status' => 'Cập nhật trạng thái đơn hàng',
    'select_new_status' => 'Chọn trạng thái mới...',
    'update_status' => 'Cập nhật trạng thái',
    'available_transitions' => 'Các chuyển đổi có sẵn:',
    'order_status' => 'Trạng thái đơn hàng',
    'cannot_be_changed_further' => 'Đơn hàng đang ở trạng thái :status và không thể thay đổi thêm.',
    
    // Order summary cards
    'customer' => 'Khách hàng',
    'order_info' => 'Thông tin đơn hàng',
    'date' => 'Ngày',
    'payment' => 'Thanh toán',
    'items' => 'Sản phẩm',
    'total' => 'Tổng',
    'shipping_address' => 'Địa chỉ giao hàng',
    'order_items' => 'Sản phẩm trong đơn hàng',
    
    // Product details
    'product' => 'Sản phẩm',
    'price' => 'Giá',
    'qty' => 'Số lượng',
    'subtotal' => 'Tạm tính',
    
    // Other
    'no_phone' => 'Không có số điện thoại',
    'n_a' => 'N/A',
    'delivery' => 'Giao hàng',
    'delivery_date_not_set' => 'Chưa đặt ngày giao hàng',
    'product_not_found' => 'Không tìm thấy sản phẩm',
    'total_colon' => 'Tổng:',
    
    // Email subject
    'email_subject_order_status_changed' => 'Cập nhật tình trạng đơn hàng',
    
    // Email header
    'email_order_notification' => 'Thông báo đơn hàng',
    
    // Email body
    'email_greeting' => 'Xin chào :name,',
    'email_status_update_intro' => 'Chúng tôi xin thông báo rằng tình trạng đơn hàng của bạn đã được cập nhật.',
    
    // Order summary section
    'email_order_summary' => 'Tóm tắt đơn hàng',
    'email_order_number' => 'Số đơn hàng',
    'email_order_date' => 'Ngày đặt hàng',
    'email_total_amount' => 'Tổng tiền',
    
    // Status update section
    'email_status_update' => 'Cập nhật tình trạng',
    
    // Status-specific messages
    'email_next_steps' => 'Bước tiếp theo',
    'email_processing_message' => 'Đơn hàng của bạn đang được đội ngũ chúng tôi chuẩn bị.',
    'email_processing_timeline' => 'Chúng tôi sẽ thông báo khi đơn hàng sẵn sàng để vận chuyển.',
    
    'email_shipping_info' => 'Thông tin vận chuyển',
    'email_shipping_message' => 'Đơn hàng của bạn đã được vận chuyển và đang trên đường giao đến bạn. Bạn sẽ nhận được trong vòng 3-5 ngày làm việc.',
    
    'email_delivery_confirmation' => 'Xác nhận giao hàng',
    'email_completed_message' => 'Đơn hàng của bạn đã được giao thành công. Cảm ơn bạn đã mua hàng!',
    
    'email_cancellation_notice' => 'Hủy đơn hàng',
    'email_cancellation_message' => 'Đơn hàng của bạn đã được hủy theo yêu cầu.',
    'email_cancellation_support' => 'Nếu bạn có bất kỳ câu hỏi nào, vui lòng liên hệ với đội ngũ hỗ trợ khách hàng của chúng tôi.',
    
    // Closing
    'email_thank_you_message' => 'Cảm ơn bạn đã lựa chọn chúng tôi. Chúng tôi trân trọng sự tin tưởng của bạn và mong được phục vụ bạn trong tương lai.',
    'email_best_regards' => 'Trân trọng,',
    'email_team_signature' => 'Đội ngũ :app_name',
    
    // Footer
    'email_contact_info' => 'Nếu bạn có bất kỳ câu hỏi nào về đơn hàng, vui lòng liên hệ đội ngũ chăm sóc khách hàng của chúng tôi.',
    'email_all_rights_reserved' => 'Tất cả quyền được bảo lưu.',

];