<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('orders.email_subject_order_status_changed') }}</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Helvetica, Arial, sans-serif;
            line-height: 1.5;
            color: #333333;
            background-color: #f5f5f5;
        }
        
        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            border: 1px solid #e0e0e0;
        }
        
        .email-header {
            background-color: #ffffff;
            padding: 24px 32px;
            border-bottom: 1px solid #e0e0e0;
        }
        
        .logo {
            font-size: 24px;
            font-weight: 700;
            color: #1a1a1a;
            margin-bottom: 8px;
        }
        
        .header-subtitle {
            font-size: 14px;
            color: #666666;
        }
        
        .email-body {
            padding: 32px;
        }
        
        .greeting {
            font-size: 16px;
            margin-bottom: 16px;
            color: #1a1a1a;
        }
        
        .message {
            font-size: 14px;
            margin-bottom: 32px;
            color: #333333;
            line-height: 1.6;
        }
        
        .order-summary {
            background-color: #f8f8f8;
            border: 1px solid #e0e0e0;
            padding: 20px;
            margin-bottom: 24px;
        }
        
        .summary-title {
            font-size: 16px;
            font-weight: 600;
            color: #1a1a1a;
            margin-bottom: 16px;
        }
        
        .summary-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 8px;
            font-size: 14px;
        }
        
        .summary-label {
            color: #666666;
        }
        
        .summary-value {
            color: #1a1a1a;
            font-weight: 500;
        }
        
        .status-update {
            border: 1px solid #e0e0e0;
            padding: 20px;
            margin-bottom: 24px;
            background-color: #ffffff;
        }
        
        .status-title {
            font-size: 16px;
            font-weight: 600;
            color: #1a1a1a;
            margin-bottom: 16px;
        }
        
        .status-flow {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 16px;
            margin: 16px 0;
        }
        
        .status-item {
            text-align: center;
            padding: 12px 20px;
            border-radius: 4px;
            font-size: 13px;
            font-weight: 500;
        }
        
        .status-old {
            background-color: #f0f0f0;
            color: #666666;
            text-decoration: line-through;
        }
        
        .status-new {
            background-color: #e8f4f8;
            color: #0066cc;
            border: 1px solid #b3d9e8;
        }
        
        .status-arrow {
            font-size: 16px;
            color: #999999;
        }
        
        .info-section {
            background-color: #f8f9fa;
            border-left: 3px solid #0066cc;
            padding: 16px 20px;
            margin: 24px 0;
        }
        
        .info-title {
            font-size: 14px;
            font-weight: 600;
            color: #1a1a1a;
            margin-bottom: 8px;
        }
        
        .info-text {
            font-size: 14px;
            color: #555555;
            line-height: 1.5;
        }
        
        .closing {
            margin-top: 32px;
            font-size: 14px;
            color: #333333;
        }
        
        .signature {
            margin-top: 24px;
            font-size: 14px;
            color: #666666;
        }
        
        .email-footer {
            background-color: #f8f8f8;
            padding: 20px 32px;
            border-top: 1px solid #e0e0e0;
            font-size: 12px;
            color: #999999;
            line-height: 1.4;
        }
        
        .footer-divider {
            border-top: 1px solid #e0e0e0;
            margin: 16px 0;
        }
        
        @media (max-width: 600px) {
            .email-container {
                margin: 0;
                border-left: none;
                border-right: none;
            }
            
            .email-header,
            .email-body,
            .email-footer {
                padding-left: 20px;
                padding-right: 20px;
            }
            
            .status-flow {
                flex-direction: column;
                gap: 12px;
            }
            
            .status-arrow {
                transform: rotate(90deg);
            }
            
            .status-item {
                width: 100%;
                max-width: 200px;
            }
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="email-header">
            <div class="logo">{{ config('app.name', 'NAITEI') }}</div>
            <div class="header-subtitle">{{ __('orders.email_order_notification') }}</div>
        </div>
        
        <div class="email-body">
            <div class="greeting">
                {{ __('orders.email_greeting', ['name' => $order->user->name]) }}
            </div>
            
            <div class="message">
                {{ __('orders.email_status_update_intro') }}
            </div>
            
            <div class="order-summary">
                <div class="summary-title">{{ __('orders.email_order_summary') }}</div>
                <div class="summary-row">
                    <span class="summary-label">{{ __('orders.email_order_number') }}</span>
                    <span class="summary-value">#{{ $order->orders_id }}</span>
                </div>
                <div class="summary-row">
                    <span class="summary-label">{{ __('orders.email_order_date') }}</span>
                    <span class="summary-value">{{ $order->order_date->format('M d, Y') }}</span>
                </div>
                <div class="summary-row">
                    <span class="summary-label">{{ __('orders.email_total_amount') }}</span>
                    <span class="summary-value">{{ number_format($order->total_amount, 0) }}đ</span>
                </div>
            </div>
            
            <div class="status-update">
                <div class="status-title">{{ __('orders.email_status_update') }}</div>
                <div class="status-flow">
                    <div class="status-item status-old">
                        {{ ucfirst(str_replace('_', ' ', $oldStatus)) }}
                    </div>
                    <span class="status-arrow">→</span>
                    <div class="status-item status-new">
                        {{ ucfirst(str_replace('_', ' ', $newStatus)) }}
                    </div>
                </div>
            </div>
            
            @if($newStatus === 'processing')
                <div class="info-section">
                    <div class="info-title">{{ __('orders.email_next_steps') }}</div>
                    <div class="info-text">
                        {{ __('orders.email_processing_message') }}
                        {{ __('orders.email_processing_timeline') }}
                    </div>
                </div>
            @endif
            
            @if($newStatus === 'shipping')
                <div class="info-section">
                    <div class="info-title">{{ __('orders.email_shipping_info') }}</div>
                    <div class="info-text">
                        {{ __('orders.email_shipping_message') }}
                    </div>
                </div>
            @endif
            
            @if($newStatus === 'completed')
                <div class="info-section">
                    <div class="info-title">{{ __('orders.email_delivery_confirmation') }}</div>
                    <div class="info-text">
                        {{ __('orders.email_completed_message') }}
                    </div>
                </div>
            @endif
            
            @if($newStatus === 'cancelled')
                <div class="info-section">
                    <div class="info-title">{{ __('orders.email_cancellation_notice') }}</div>
                    <div class="info-text">
                        {{ __('orders.email_cancellation_message') }}<br>
                        {{ __('orders.email_cancellation_support') }}
                    </div>
                </div>
            @endif
            
            <div class="closing">
                {{ __('orders.email_thank_you_message') }}
            </div>
            
            <div class="signature">
                {{ __('orders.email_best_regards') }}<br>
                {{ __('orders.email_team_signature', ['app_name' => config('app.name', 'NAITEI')]) }}
            </div>
        </div>
        
        <div class="email-footer">
            <div>{{ __('orders.email_contact_info') }}</div>
            <div class="footer-divider"></div>
            <div>© {{ date('Y') }} {{ config('app.name', 'NAITEI') }}. {{ __('orders.email_all_rights_reserved') }}</div>
        </div>
    </div>
</body>
</html>