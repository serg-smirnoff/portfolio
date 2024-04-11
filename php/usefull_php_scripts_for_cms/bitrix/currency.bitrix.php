$xml_file = $_SERVER['DOCUMENT_ROOT']."/bitrix/cache/currency_rates.xml";
if (filemtime($xml_file)+3600*6 < time() OR !file_exists($xml_file)) { // Проверяем обновление каждые 6 часов
   $xml_data = file_get_contents("http://www.cbr.ru/scripts/XML_daily.asp");
   if ($xml_data) {
      file_put_contents($xml_file, $xml_data);
      $data = xml2array($xml_data);
      $data_values = array();
      $data_nominal = array();
      foreach ($data['ValCurs']['Valute'] as $valute) {
         $data_values[$valute['CharCode']['value']] = str_replace(",", ".", $valute['Value']['value']);
         $data_nominal[$valute['CharCode']['value']] = $valute['Nominal']['value'];
      }
      if (CModule::IncludeModule("currency") AND date("N") != 6 AND date("N") != 7 AND $data) { // Не обновляем курс валют по выходным
         $currencies = array();
         $rsCurrency = CCurrency::GetList($by, $order);
         $base_currency = CCurrency::GetBaseCurrency();
         while ($arCurrency = $rsCurrency->GetNext()) {
            if ($arCurrency['CURRENCY'] != $base_currency) {
               $arCurrency['TIMESTAMP'] = MakeTimeStamp($arCurrency['DATE_UPDATE'], "YYYY-MM-DD HH:MI:SS");
               $r = CCurrencyRates::Add(array(
                  'CURRENCY' => $arCurrency['CURRENCY'],
                  'DATE_RATE' => $data['ValCurs']['attr']['Date'],
                  'RATE_CNT' => $data_nominal[$arCurrency['CURRENCY']],
                  'RATE' => $data_values[$arCurrency['CURRENCY']],
               ));
            }
         }
      }
   }
}