<?php
function key_to_class_var($key)
    {
        $transform = strtolower(
            preg_replace('/([a-z])([A-Z])/',
            '\1_\2',
            $key
            )
        );
        return $transform;

    }

    
 $api_keys_for_apps = array (
		'website' => array('CouponCount','WebsiteID','WebsiteTitle','WebsiteName','WebsiteURL','Description','LogoBackgroundColor','ImageURL'),
		'onlineOfferRegular' => array('CouponID','CouponCode','CountSuccess','CountFail','Hits','Discount','Title','Description','WebsiteID','Expiry','DateVerified','IsOneTimeUse','IsDeal','FullTerms','DiscountByValue','WebsiteName','WebsiteTitle','WebsiteCategoryID','IsSpecialPopUp','LogoBackgroundColor','LandingPageURL','CoverURL','ImageURL'),
		'onlineOfferDetailed' => array('CouponID','CouponCode','CountSuccess','CountFail','Hits','Discount','Title','Description','WebsiteID','Expiry','DateVerified','IsOneTimeUse','IsDeal','FullTerms','DiscountByValue','WebsiteName','WebsiteTitle','WebsiteCategoryID','IsSpecialPopUp','LogoBackgroundColor','LandingPageURL','CoverURL','ImageURL'),
		'restaurantOfferRegular' => array('BrandID','OfflineCouponID','Title','OfflineCouponCode','TermsAndConditions','Description','DiscountType','DiscountTypeValue','NumCouponsAvailable','NumCouponsTotal','UniqueCodeOrGeneric','CanBeUsedMultipleTimes','PrintNeeded','IsDeal','Priority','CountSuccess','CountFail','Hits','DateAdded','AddedByAdminID','IsActive','StartDate','EndDate','ValidityDescription','NumFetchAllowed','NumFetchUsed','ValidationRequired','MaxPerDay','MaxPerUser','AutoGenerateCodes','UsageLimitWithoutValidation','UsageLimitPercent','MarkAsRead','NumCouponCodePerPeriod','CouponCodePeriod','CouponCodeInterval','URLKeyword','max(DateAdded)','CityID','LogoURL','BrandName','BrandURL','LogoBackgroundColor'),
		'restaurantOfferDetailed' => array('BrandID','OfflineCouponID','Title','OfflineCouponCode','TermsAndConditions','Description','DiscountType','DiscountTypeValue','NumCouponsAvailable','NumCouponsTotal','UniqueCodeOrGeneric','CanBeUsedMultipleTimes','PrintNeeded','IsDeal','Priority','CountSuccess','CountFail','Hits','DateAdded','AddedByAdminID','IsActive','StartDate','EndDate','ValidityDescription','NumFetchAllowed','NumFetchUsed','ValidationRequired','MaxPerDay','MaxPerUser','AutoGenerateCodes','UsageLimitWithoutValidation','UsageLimitPercent','MarkAsRead','NumCouponCodePerPeriod','CouponCodePeriod','CouponCodeInterval','URLKeyword','max(DateAdded)','CityID','LogoURL','BrandName','BrandURL','LogoBackgroundColor'),
		'retailOfferRegular' => array('BrandID','OfflineCouponID','Title','OfflineCouponCode','TermsAndConditions','Description','DiscountType','DiscountTypeValue','NumCouponsAvailable','NumCouponsTotal','UniqueCodeOrGeneric','CanBeUsedMultipleTimes','PrintNeeded','IsDeal','Priority','CountSuccess','CountFail','Hits','DateAdded','AddedByAdminID','IsActive','StartDate','EndDate','ValidityDescription','NumFetchAllowed','NumFetchUsed','ValidationRequired','MaxPerDay','MaxPerUser','AutoGenerateCodes','UsageLimitWithoutValidation','UsageLimitPercent','MarkAsRead','NumCouponCodePerPeriod','CouponCodePeriod','CouponCodeInterval','URLKeyword','max(DateAdded)','CityID','LogoURL','BrandName','BrandURL','LogoBackgroundColor'),
		'retailOfferDetailed' => array('BrandID','OfflineCouponID','Title','OfflineCouponCode','TermsAndConditions','Description','DiscountType','DiscountTypeValue','NumCouponsAvailable','NumCouponsTotal','UniqueCodeOrGeneric','CanBeUsedMultipleTimes','PrintNeeded','IsDeal','Priority','CountSuccess','CountFail','Hits','DateAdded','AddedByAdminID','IsActive','StartDate','EndDate','ValidityDescription','NumFetchAllowed','NumFetchUsed','ValidationRequired','MaxPerDay','MaxPerUser','AutoGenerateCodes','UsageLimitWithoutValidation','UsageLimitPercent','MarkAsRead','NumCouponCodePerPeriod','CouponCodePeriod','CouponCodeInterval','URLKeyword','max(DateAdded)','CityID','LogoURL','BrandName','BrandURL','LogoBackgroundColor'),
		'restaurantBrand' =>  array('BrandID','Name','Description','URLKeyword','URL','WebsiteID','IsActive','AccessCode','LogoBackgroundColor','LogoLastModified','Categories'),
		'retailBrand' =>  array('BrandID','Name','Description','URLKeyword','URL','WebsiteID','IsActive','AccessCode','LogoBackgroundColor','LogoLastModified','Categories'),
		'restaurantOutlet' => array('SubFranchiseID','OutletID','OutletName','BrandID','CityID','Email','LogoLastModified','Rating','Timings','CityRank','Latitude','Longitude','Pincode','Landmark','Streetname','Price','MenuImages','OutletImages','TimesCityOutletID','Distance','BrandName','LogoBackgroundColor','OutletURL','NeighbourhoodName','PhoneNumber','CityName','MenuImagesThumbnails','OutletImagesThumbnails','NumCoupons','Categories','LogoURL','CoverURL','Description'),
		'retailOutlet' => array('SubFranchiseID','OutletID','OutletName','BrandID','CityID','Email','LogoLastModified','Rating','Timings','CityRank','Latitude','Longitude','Pincode','Landmark','Streetname','Price','MenuImages','OutletImages','TimesCityOutletID','Distance','BrandName','LogoBackgroundColor','OutletURL','NeighbourhoodName','PhoneNumber','CityName','MenuImagesThumbnails','OutletImagesThumbnails','NumCoupons','Categories','LogoURL','CoverURL','Description'),

		);

	foreach ($api_keys_for_apps as $key =>$value) {

		echo "'".$key."'"." => array(";
		foreach($value as $data){
			echo "'".key_to_class_var($data). "', ";
		}
		echo "),";
		

		
		
	}

?>