<?php
namespace Chetu\Himanshu\Controller\Index;

use Magento\Framework\App\Action\Context; //c
use Magento\Framework\App\Filesystem\DirectoryList; //c

class Index extends \Magento\Framework\App\Action\Action
{
	protected $_pageFactory;

	public function __construct(
		\Magento\Framework\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $pageFactory,
		\Magento\Framework\App\ResourceConnection $resource,

		\Magento\Framework\Filesystem $filesystem,
        \Magento\Customer\Model\CustomerFactory $customerFactory
		) //add
	{
		$this->_pageFactory = $pageFactory;
		$this->_resource = $resource; //add
		
		$this->customerFactory = $customerFactory;
        $this->directory = $filesystem->getDirectoryWrite(DirectoryList::VAR_DIR);
		return parent::__construct($context);
	}

	public function execute()
	{
		$connection = $this->_resource; //add
		$conn=$connection->getConnection(); //add

		// if (!$conn){
        //     echo "Connection to the database failed."; 
        // }
        // echo "Successfully connected to the database";

		$fname = $this->getRequest()->getParam('fname');
		$lname = $this->getRequest()->getParam('lname');
		$tea_obs = $this->getRequest()->getParam('tea_obs');
		$email = $this->getRequest()->getParam('email');
		$phone = $this->getRequest()->getParam('phone');
		// $upload = $this->getRequest()->getParam('upload');
		$dob = $this->getRequest()->getParam('date');
		$grade = $this->getRequest()->getParam('grade');
		// $env = $this->getRequest()->getParam('class-env'); //checkbox
		// $rank = $this->getRequest()->getParam('highest-level'); //checkbox
		$impr = $this->getRequest()->getParam('impression');
		$text = $this->getRequest()->getParam('wonderings');

		$name = $fname." ".$lname;
		
		//csv
		$filepath = 'export/observationForm.csv';
        $this->directory->create('export');
        $stream = $this->directory->openFile($filepath, 'w+');
        $stream->lock();

		$header = ['Name', 'Teachers Observation', 'Email', 'Phone', 'dob', 'Grade', 'Impression', 'text'];
        $stream->writeCsv($header);

        $collection = $this->customerFactory->create()->getCollection();
        foreach ($collection as $customer) {
            $data = [];
            $data[] = $name;
			$data[] = $tea_obs;
			$data[] = $email;
			$data[] = $phone;
			$data[] = $dob;
			$data[] = $grade;
			$data[] = $impr;
			$data[] = $text;
			
            $stream->writeCsv($data);
		}
		die;



		$sql = "INSERT INTO `himanshu_observation_form`(`name`, `teacher_observed`, `email`, `phone`, `image`, `dob`, `grade`, `impression`, `wondering`)  VALUES ('$name','$tea_obs','$email','$phone','$upload','$dob','$grade','$impr','$text')";

		$conn->query($sql);
		echo "<script>alert('Data submitted successfully')</script>";	

	}
}
