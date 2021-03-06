<?php
/**************************************************************************
 * Test.php, IMIE evalute
 *
 * Maxime Léau Copyright 2015
 * Description :
 * Author(s) : Maxime Léau <maxime.leau@imie-rennes.fr>
 * Licence : All right reserved.
 * Last update : April 6, 2015
 *
 **************************************************************************/
namespace Imie\EvaluateBundle\Entity;

use Imie\CoreBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Imie\CoreBundle\ImieCoreBundle;

/**
 * Test entity
 * @ORM\Entity
 * @ORM\Table(name="test")
 * @ORM\Entity(repositoryClass="Imie\EvaluateBundle\Repository\TestRepository")
 */
class Test
{
	/**
	 * Test ID
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 * @var integer
	 */
	protected $id;
	
	/**
	 * Test Libel
	 * @ORM\Column(type="string", length=255)
	 * @var string
	 */
	protected $libel;
	
	/**
	 * Test Factor
	 * @ORM\Column(type="float")
	 * @var float
	 */
	protected $factor;
	
	/**
	 * Test GradesAverage
	 * @ORM\Column(name="grades_average", type="float", nullable=true)
	 * @var float
	 */
	protected $gradesAverage;
	
	/**
	 * Test MaxGrade
	 * @ORM\Column(name="max_grade", type="float", nullable=true)
	 * @var float
	 */
	protected $maxGrade;
	
	/**
	 * Test MinGrade
	 * @ORM\Column(name="min_grade", type="float", nullable=true)
	 * @var float
	 */
	protected $minGrade;
	
	/**
	 * Test Created date
	 * @ORM\Column(name="created_at", type="datetime")
	 * @var \DateTime
	 */
	protected $createdAt;	
	
	/**
	 * Test Locked date (The teacher will not able to add grades if the current date is older than locked date)
	 * @ORM\Column(name="locked_at", type="datetime")
	 * @var \DateTime
	 */
	protected $lockedAt;
	
	/**
	 * Test Grades Collection
	 * @ORM\OneToMany(targetEntity="Imie\EvaluateBundle\Entity\Grade", mappedBy="grade", cascade={"persist"})
	 * @var \Doctrine\Common\Collections\Collection
	 */
	protected $grades;
	
	/**
	 * Test Classe
	 * @ORM\ManyToOne(targetEntity="Imie\EvaluateBundle\Entity\Classe", inversedBy="tests")
	 * @ORM\JoinColumn(name="classe_id", referencedColumnName="id")
	 * @var \Imie\EvaluateBundle\Entity\Classe
	 */
	protected $classe;
	
	/**
	 * Test Teacher
	 * @ORM\ManyToOne(targetEntity="Imie\CoreBundle\Entity\Teacher", inversedBy="tests")
	 * @ORM\JoinColumn(name="teacher_id", referencedColumnName="id")
	 * @var \Imie\CoreBundle\Entity\Teacher
	 */
	protected $teacher;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->grades = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set libel
     *
     * @param string $libel
     * @return Test
     */
    public function setLibel($libel)
    {
        $this->libel = $libel;

        return $this;
    }

    /**
     * Get libel
     *
     * @return string 
     */
    public function getLibel()
    {
        return $this->libel;
    }

    /**
     * Set factor
     *
     * @param integer $factor
     * @return Test
     */
    public function setFactor($factor)
    {
        $this->factor = $factor;

        return $this;
    }

    /**
     * Get factor
     *
     * @return integer 
     */
    public function getFactor()
    {
        return $this->factor;
    }

    /**
     * Set gradesAverage
     *
     * @param string $gradesAverage
     * @return Test
     */
    public function setGradesAverage($gradesAverage)
    {
        $this->gradesAverage = $gradesAverage;

        return $this;
    }

    /**
     * Get gradesAverage
     *
     * @return string 
     */
    public function getGradesAverage()
    {
        return $this->gradesAverage;
    }

    /**
     * Set maxGrade
     *
     * @param string $maxGrade
     * @return Test
     */
    public function setMaxGrade($maxGrade)
    {
        $this->maxGrade = $maxGrade;

        return $this;
    }

    /**
     * Get maxGrade
     *
     * @return string 
     */
    public function getMaxGrade()
    {
        return $this->maxGrade;
    }

    /**
     * Set minGrade
     *
     * @param string $minGrade
     * @return Test
     */
    public function setMinGrade($minGrade)
    {
        $this->minGrade = $minGrade;

        return $this;
    }

    /**
     * Get minGrade
     *
     * @return string 
     */
    public function getMinGrade()
    {
        return $this->minGrade;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Test
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Add grades
     *
     * @param \Imie\EvaluateBundle\Entity\Grade $grades
     * @return Test
     */
    public function addGrade(\Imie\EvaluateBundle\Entity\Grade $grades)
    {
        $this->grades[] = $grades;

        return $this;
    }

    /**
     * Remove grades
     *
     * @param \Imie\EvaluateBundle\Entity\Grade $grades
     */
    public function removeGrade(\Imie\EvaluateBundle\Entity\Grade $grades)
    {
        $this->grades->removeElement($grades);
    }

    /**
     * Get grades
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getGrades()
    {
        return $this->grades;
    }

    /**
     * Set classe
     *
     * @param \Imie\EvaluateBundle\Entity\Classe $classe
     * @return Test
     */
    public function setClasse(\Imie\EvaluateBundle\Entity\Classe $classe = null)
    {
        $this->classe = $classe;

        return $this;
    }

    /**
     * Get classe
     *
     * @return \Imie\EvaluateBundle\Entity\Classe 
     */
    public function getClasse()
    {
        return $this->classe;
    }

    /**
     * Set teacher
     *
     * @param \Imie\CoreBundle\Entity\Teacher $teacher
     * @return Test
     */
    public function setTeacher(\Imie\CoreBundle\Entity\Teacher $teacher = null)
    {
        $this->teacher = $teacher;

        return $this;
    }

    /**
     * Get teacher
     *
     * @return \Imie\CoreBundle\Entity\Teacher 
     */
    public function getTeacher()
    {
        return $this->teacher;
    }

    /**
     * Set lockedAt
     *
     * @param \DateTime $lockedAt
     * @return Test
     */
    public function setLockedAt($lockedAt)
    {
        $this->lockedAt = $lockedAt;

        return $this;
    }

    /**
     * Get lockedAt
     *
     * @return \DateTime 
     */
    public function getLockedAt()
    {
        return $this->lockedAt;
    }
}
