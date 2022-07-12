<?php
namespace Chetu\Himanshu\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;

class InstallData implements InstallDataInterface
{
    private $eavSetupFactory;

    public function __construct(EavSetupFactory $eavSetupFactory) {
        $this->eavSetupFactory = $eavSetupFactory;
    }

    public function install(
        ModuleDataSetupInterface $setup, ModuleContextInterface $context
        )
    {
        $setup->startSetup();

        $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);
        $eavSetup->addAttribute(\Magento\Catalog\Model\Category::ENTITY,
		    'custom_attribute', [
            'type'     => 'int',
            'label'    => 'Custom Attribute',
            'input'    => 'boolean',
            'source' => 'Magento\Eav\Model\Entity\Attribute\Source\Boolean',
        	'global'   => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
			'visible' => true,
			'required' => false,
			'user_defined' => false,
			'default' => null,
			'group' => 'General Information',
			'backend' => ''
        ]);
    }
}
// Attribute programatically
