<?php namespace ScholarCheck;

use Pdp\Parser;

class AcademicEmail {

    /**
     * @var Parser
     */
    private $parser;

    protected $email;
    protected $domain;

    function __construct($email)
    {
        $pslManager = new \Pdp\PublicSuffixListManager();
        $this->parser = new \Pdp\Parser($pslManager->getList());

        $this->email = $email;

        $this->setDomain();
    }

    public function jsonResponse()
    {
        return response()->json([
            'valid' => $this->isValid(),
            'institutionName' => $this->institutionName()
        ]);
    }

    public function isValid()
    {
        if(empty($this->email) || $this->domain === null)
        {
            return false;
        }

        if($this->isBlacklisted())
        {
            return false;
        }

        if(in_array($this->domain['tld'], $this->getAcademicTlds()))
        {
            return true;
        }

        if($this->matchesAcademicDomain())
        {
            return true;
        }

        return false;
    }

    public function institutionName()
    {
        return $this->nameFromAcademicDomain();
    }

    private function matchesAcademicDomain()
    {
        if (empty($this->domain['tld']) or empty($this->domain['sld'])) {
            return false;
        }

        return file_exists($this->getPath());
    }

    private function nameFromAcademicDomain()
    {
        $path = $this->getPath($this->domain);
        if ( ! file_exists($path)) {
            return "";
        }
        return trim(file_get_contents($path));
    }

    private function getPath()
    {
        $domainParts = array_reverse(explode('.', $this->domain['host']->registerableDomain));

        return storage_path() . '/domains/' . implode("/", $domainParts) . ".txt";
    }

    private function setDomain()
    {
        try {
            $domain = array();

            $url = $this->parser->parseUrl(trim($this->email));
            $domain['tld'] = $url->host->publicSuffix;
            $registerableDomainParts = explode('.', $url->host->registerableDomain);
            $domain['sld'] = $registerableDomainParts[0];
            $domain['host'] = $url->host;

            $this->domain = $domain;

        } catch (\Exception $e) {
            return null;
        }
    }

    private function isBlacklisted()
    {
        foreach ($this->getBlacklistedTlds() as $blacklistedDomain) {
            $name = (string) $this->domain['host'];
            if (preg_match('/' . preg_quote($blacklistedDomain) . '$/', $name)) {
                return true;
            }
        }
        return false;
    }

    private function getBlacklistedTlds()
    {
        return [
            'si.edu',
            'america.edu',
            'californiacolleges.edu',
            'australia.edu',
            'cet.edu'
        ];
    }

    private function getAcademicTlds()
    {
        return [
            'ac.ae',
            'ac.at',
            'ac.bd',
            'ac.be',
            'ac.cn',
            'ac.cr',
            'ac.cy',
            'ac.fj',
            'ac.gg',
            'ac.gn',
            'ac.id',
            'ac.il',
            'ac.in',
            'ac.ir',
            'ac.jp',
            'ac.ke',
            'ac.kr',
            'ac.ma',
            'ac.me',
            'ac.mu',
            'ac.mw',
            'ac.mz',
            'ac.ni',
            'ac.nz',
            'ac.om',
            'ac.pa',
            'ac.pg',
            'ac.pr',
            'ac.rs',
            'ac.ru',
            'ac.rw',
            'ac.sz',
            'ac.th',
            'ac.tz',
            'ac.ug',
            'ac.uk',
            'ac.yu',
            'ac.za',
            'ac.zm',
            'ac.zw',
            'ed.ao',
            'ed.cr',
            'ed.jp',
            'edu',
            'edu.af',
            'edu.al',
            'edu.ar',
            'edu.au',
            'edu.az',
            'edu.ba',
            'edu.bb',
            'edu.bd',
            'edu.bh',
            'edu.bi',
            'edu.bn',
            'edu.bo',
            'edu.br',
            'edu.bs',
            'edu.bt',
            'edu.bz',
            'edu.ck',
            'edu.cn',
            'edu.co',
            'edu.cu',
            'edu.do',
            'edu.dz',
            'edu.ec',
            'edu.ee',
            'edu.eg',
            'edu.er',
            'edu.es',
            'edu.et',
            'edu.ge',
            'edu.gh',
            'edu.gr',
            'edu.gt',
            'edu.hk',
            'edu.hn',
            'edu.ht',
            'edu.in',
            'edu.iq',
            'edu.jm',
            'edu.jo',
            'edu.kg',
            'edu.kh',
            'edu.kn',
            'edu.kw',
            'edu.ky',
            'edu.kz',
            'edu.la',
            'edu.lb',
            'edu.lr',
            'edu.lv',
            'edu.ly',
            'edu.me',
            'edu.mg',
            'edu.mk',
            'edu.ml',
            'edu.mm',
            'edu.mn',
            'edu.mo',
            'edu.mt',
            'edu.mv',
            'edu.mw',
            'edu.mx',
            'edu.my',
            'edu.ni',
            'edu.np',
            'edu.om',
            'edu.pa',
            'edu.pe',
            'edu.ph',
            'edu.pk',
            'edu.pl',
            'edu.pr',
            'edu.ps',
            'edu.pt',
            'edu.pw',
            'edu.py',
            'edu.qa',
            'edu.rs',
            'edu.ru',
            'edu.sa',
            'edu.sc',
            'edu.sd',
            'edu.sg',
            'edu.sh',
            'edu.sl',
            'edu.sv',
            'edu.sy',
            'edu.tr',
            'edu.tt',
            'edu.tw',
            'edu.ua',
            'edu.uy',
            'edu.ve',
            'edu.vn',
            'edu.ws',
            'edu.ye',
            'edu.zm',
            'es.kr',
            'g12.br',
            'hs.kr',
            'ms.kr',
            'sc.kr',
            'sc.ug',
            'sch.ae',
            'sch.gg',
            'sch.id',
            'sch.ir',
            'sch.je',
            'sch.jo',
            'sch.lk',
            'sch.ly',
            'sch.my',
            'sch.om',
            'sch.ps',
            'sch.sa',
            'sch.uk',
            'school.nz',
            'school.za',
            'vic.edu.au'
        ];
    }
}
