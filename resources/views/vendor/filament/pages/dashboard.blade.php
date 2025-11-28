@extends('filament::pages.dashboard')

@section('styles')
    <style>
        /* Yellowish theme for dashboard - Light mode */
        body {
            background: linear-gradient(135deg, #fff9e6 0%, #fef3c7 25%, #fde68a 50%, #fcd34d 75%, #fbbf24 100%) !important;
            background-attachment: fixed !important;
        }
        
        /* Dark mode styling */
        .dark body {
            background: #333 !important;
        }
        
        /* Main panel styling - Light mode */
        .fi-panel {
            background: rgba(255, 255, 255, 0.9) !important;
            backdrop-filter: blur(10px) !important;
            border: 1px solid rgba(251, 191, 36, 0.2) !important;
            box-shadow: 0 4px 6px rgba(251, 191, 36, 0.1) !important;
        }
        
        /* Main panel styling - Dark mode */
        .dark .fi-panel {
            background: rgba(51, 51, 51, 0.9) !important;
            backdrop-filter: blur(10px) !important;
            border: 1px solid rgba(251, 191, 36, 0.3) !important;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3) !important;
        }
        
        /* Navigation - Light mode */
        .fi-sidebar {
            background: linear-gradient(180deg, rgba(254, 243, 199, 0.95) 0%, rgba(253, 230, 138, 0.95) 100%) !important;
            border-right: 1px solid rgba(251, 191, 36, 0.3) !important;
        }
        
        /* Navigation - Dark mode */
        .dark .fi-sidebar {
            background: linear-gradient(180deg, rgba(51, 51, 51, 0.95) 0%, rgba(64, 64, 64, 0.95) 100%) !important;
            border-right: 1px solid rgba(251, 191, 36, 0.3) !important;
        }
        
        .fi-nav-item {
            color: #92400e !important;
            border-radius: 8px !important;
            margin: 2px 8px !important;
            transition: all 0.3s ease !important;
        }
        
        .dark .fi-nav-item {
            color: #fbbf24 !important;
        }
        
        .fi-nav-item:hover {
            background: rgba(251, 191, 36, 0.2) !important;
            color: #78350f !important;
        }
        
        .dark .fi-nav-item:hover {
            background: rgba(251, 191, 36, 0.1) !important;
            color: #fcd34d !important;
        }
        
        .fi-nav-item.active {
            background: linear-gradient(135deg, #fbbf24, #f59e0b) !important;
            color: white !important;
            box-shadow: 0 2px 4px rgba(251, 191, 36, 0.3) !important;
        }
        
        /* Header - Light mode */
        .fi-header {
            background: rgba(255, 255, 255, 0.8) !important;
            backdrop-filter: blur(10px) !important;
            border-bottom: 1px solid rgba(251, 191, 36, 0.2) !important;
        }
        
        /* Header - Dark mode */
        .dark .fi-header {
            background: rgba(51, 51, 51, 0.8) !important;
            backdrop-filter: blur(10px) !important;
            border-bottom: 1px solid rgba(251, 191, 36, 0.2) !important;
        }
        
        /* Cards - Light mode */
        .fi-card {
            background: rgba(255, 255, 255, 0.8) !important;
            backdrop-filter: blur(10px) !important;
            border: 1px solid rgba(251, 191, 36, 0.2) !important;
            border-radius: 12px !important;
            box-shadow: 0 2px 8px rgba(251, 191, 36, 0.1) !important;
        }
        
        /* Cards - Dark mode */
        .dark .fi-card {
            background: rgba(51, 51, 51, 0.8) !important;
            backdrop-filter: blur(10px) !important;
            border: 1px solid rgba(251, 191, 36, 0.2) !important;
            border-radius: 12px !important;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3) !important;
        }
        
        /* Stats cards - Light mode */
        .fi-stats-overview-card {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.9), rgba(254, 243, 199, 0.9)) !important;
            border: 1px solid rgba(251, 191, 36, 0.3) !important;
            border-radius: 16px !important;
            box-shadow: 0 4px 12px rgba(251, 191, 36, 0.2) !important;
            transition: transform 0.3s ease, box-shadow 0.3s ease !important;
        }
        
        /* Stats cards - Dark mode */
        .dark .fi-stats-overview-card {
            background: linear-gradient(135deg, rgba(51, 51, 51, 0.9), rgba(64, 64, 64, 0.9)) !important;
            border: 1px solid rgba(251, 191, 36, 0.3) !important;
            border-radius: 16px !important;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3) !important;
            transition: transform 0.3s ease, box-shadow 0.3s ease !important;
        }
        
        .fi-stats-overview-card:hover {
            transform: translateY(-4px) !important;
            box-shadow: 0 8px 20px rgba(251, 191, 36, 0.3) !important;
        }
        
        .dark .fi-stats-overview-card:hover {
            box-shadow: 0 8px 20px rgba(251, 191, 36, 0.4) !important;
        }
        
        /* Buttons - Light mode */
        .fi-btn {
            background: linear-gradient(135deg, #fbbf24, #f59e0b) !important;
            color: white !important;
            border: none !important;
            border-radius: 8px !important;
            font-weight: 600 !important;
            transition: all 0.3s ease !important;
        }
        
        /* Buttons - Dark mode */
        .dark .fi-btn {
            background: linear-gradient(135deg, #fbbf24, #f59e0b) !important;
            color: #333 !important;
            border: none !important;
            border-radius: 8px !important;
            font-weight: 600 !important;
            transition: all 0.3s ease !important;
        }
        
        .fi-btn:hover {
            background: linear-gradient(135deg, #f59e0b, #d97706) !important;
            transform: translateY(-1px) !important;
            box-shadow: 0 4px 8px rgba(251, 191, 36, 0.3) !important;
        }
        
        /* Tables - Light mode */
        .fi-table {
            background: rgba(255, 255, 255, 0.8) !important;
            border-radius: 12px !important;
            overflow: hidden !important;
        }
        
        .fi-table th {
            background: linear-gradient(135deg, rgba(254, 243, 199, 0.9), rgba(253, 230, 138, 0.9)) !important;
            color: #78350f !important;
            font-weight: 600 !important;
            border-bottom: 2px solid rgba(251, 191, 36, 0.3) !important;
        }
        
        .fi-table td {
            border-bottom: 1px solid rgba(251, 191, 36, 0.1) !important;
        }
        
        .fi-table tr:hover {
            background: rgba(251, 191, 36, 0.05) !important;
        }
        
        /* Tables - Dark mode */
        .dark .fi-table {
            background: rgba(51, 51, 51, 0.8) !important;
            border-radius: 12px !important;
            overflow: hidden !important;
        }
        
        .dark .fi-table th {
            background: linear-gradient(135deg, rgba(51, 51, 51, 0.9), rgba(64, 64, 64, 0.9)) !important;
            color: #fbbf24 !important;
            font-weight: 600 !important;
            border-bottom: 2px solid rgba(251, 191, 36, 0.3) !important;
        }
        
        .dark .fi-table td {
            border-bottom: 1px solid rgba(251, 191, 36, 0.1) !important;
            color: #e5e5e5 !important;
        }
        
        .dark .fi-table tr:hover {
            background: rgba(251, 191, 36, 0.05) !important;
        }
        
        /* Forms - Light mode */
        .fi-fo-input {
            background: rgba(255, 255, 255, 0.8) !important;
            border: 1px solid rgba(251, 191, 36, 0.3) !important;
            border-radius: 8px !important;
            transition: all 0.3s ease !important;
            color: #333 !important;
        }
        
        .fi-fo-input:focus {
            border-color: #fbbf24 !important;
            box-shadow: 0 0 0 3px rgba(251, 191, 36, 0.2) !important;
            background: rgba(255, 255, 255, 0.9) !important;
        }
        
        /* Forms - Dark mode */
        .dark .fi-fo-input {
            background: rgba(51, 51, 51, 0.8) !important;
            border: 1px solid rgba(251, 191, 36, 0.3) !important;
            border-radius: 8px !important;
            transition: all 0.3s ease !important;
            color: #e5e5e5 !important;
        }
        
        .dark .fi-fo-input:focus {
            border-color: #fbbf24 !important;
            box-shadow: 0 0 0 3px rgba(251, 191, 36, 0.2) !important;
            background: rgba(64, 64, 64, 0.9) !important;
        }
        
        /* Text colors in dark mode */
        .dark .fi-text-primary {
            color: #fbbf24 !important;
        }
        
        .dark .fi-text-secondary {
            color: #d1d5db !important;
        }
        
        /* Scrollbar - Light mode */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }
        
        ::-webkit-scrollbar-track {
            background: rgba(254, 243, 199, 0.3) !important;
            border-radius: 4px;
        }
        
        ::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, #fbbf24, #f59e0b) !important;
            border-radius: 4px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(135deg, #f59e0b, #d97706) !important;
        }
        
        /* Scrollbar - Dark mode */
        .dark ::-webkit-scrollbar-track {
            background: #333 !important;
            border-radius: 4px;
        }
        
        .dark ::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, #fbbf24, #f59e0b) !important;
            border-radius: 4px;
        }
    </style>
@endsection

@section('content')
    @parent
@endsection
