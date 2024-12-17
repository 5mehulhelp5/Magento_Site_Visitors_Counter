# Magento_Site_Visitors_Counter
Overview

The Magento Site Visitors Counter is a custom Magento 2 module that tracks and displays site visitor statistics in the Magento admin dashboard. This module counts unique visitors, tracks page views, and provides real-time visitor analytics for Magento-based websites.

Features

Total Visitors: Shows the cumulative number of visitors.

Today's Visitors: Displays the number of visitors for the current day.

Weekly Visitors: Tracks visitors for the last 7 days.

Admin Dashboard Integration: Visitor stats are conveniently displayed in the Magento admin dashboard.

Installation

1. Clone the Repository:

cd <your-magento-root-directory>/app/code
mkdir -p Mr/Visitors
cd Mr/Visitors
git clone <repository-url> .

2. Enable the Module:

php bin/magento module:enable Mr_Visitors

3. Run Magento Setup:

php bin/magento setup:upgrade
php bin/magento cache:flush
php bin/magento setup:di:compile
php bin/magento setup:static-content:deploy

4. Verify Installation:

Log in to the Magento admin panel.

Navigate to Dashboard, and you should see visitor statistics.
Usage

Dashboard Display: Visit Admin Panel > Dashboard to view visitor stats.

Metrics Provided:

Total Visitors: The cumulative number of visitors.

Today's Visitors: Visitors since midnight.

Weekly Visitors: Visitors from the last 7 days.

Contributing

We welcome contributions! Follow these steps:

Fork the repository.

Create a feature branch: git checkout -b feature-name.

Commit your changes: git commit -m 'Add feature description'.

Push to the branch: git push origin feature-name.

Create a pull request.
