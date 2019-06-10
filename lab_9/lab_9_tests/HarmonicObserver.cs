using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using lab_9.Model;

namespace lab_9_tests
{
    class HarmonicObserver : IObserverHarmoic
    {
        public bool PropertiesChanged { get; set; }

        public HarmonicObserver()
        {
            PropertiesChanged = false;
        }

        public void PropertyChanges()
        {
            PropertiesChanged = true;
        }
    }
}
