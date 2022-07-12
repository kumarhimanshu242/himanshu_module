<?xml version="1.0"?>
<page xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" layout="1column" xsi:noNamespaceSchemaLocation="urn:magento:framework:View/Layout/etc/page_configuration.xsd">
<head>
    <css src="Chetu_Himanshu::css/himanshu.css"/>
    <!-- <css src="css/style.css" rel="stylesheet" type="text/css"  /> -->
</head>
<body>
    <referenceContainer name="content">
        <block class="Chetu\Himanshu\Block\Index" name="himanshu_index_index" template="Chetu_Himanshu::form.phtml" />
    </referenceContainer>
    <referenceContainer name="messages">
        <block class="Chetu\Himanshu\Block\Index" name="himanshu_index_index_carousel" template="Chetu_Himanshu::carousel.phtml" />
    </referenceContainer>

</body>
</page>
