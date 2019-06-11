using System.Collections.Generic;

namespace lab9.Model
{
    public class HarmonicContainer : IHarmonicContainer
    {
        private List<IHarmonic> _harmonics = new List<IHarmonic>();
        private List<IObserverHarmonicContainer> _observers;

        public HarmonicContainer()
        {
            _observers = new List<IObserverHarmonicContainer>();
        }

        public void AddHarmonic( IHarmonic harmonic )
        {
            _harmonics.Add( harmonic );
            if ( _observers != null )
            {
                foreach ( var observer in _observers )
                {
                    observer.AddedNewHarmonic( _harmonics.Count - 1 );
                }
            }
        }

        public void RemoveHarmonic( int index )
        {
            if ( index >= 0 && index < _harmonics.Count )
            {
                _harmonics.RemoveAt( index );
                if ( _observers != null )
                {
                    foreach ( var observer in _observers )
                    {
                        observer.RemovedHarmonic( index );
                    }
                }
                return;
            }
        }

        public List<IHarmonic> GetAllHarmonic()
        {
            return _harmonics;
        }

        public void AddObserver( IObserverHarmonicContainer observer )
        {
            _observers.Add( observer );
        }

        public IHarmonicView [] GetAllPresentation()
        {
            return _harmonics.ToArray();
        }
    }
}